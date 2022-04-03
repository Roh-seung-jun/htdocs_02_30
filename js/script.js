let history = [];
let checkAble = false;
let cnt = 0;
let removeEle = null;




$(()=>{
    cardSet();

    $(document)
        .on('click','.file_add',function(){
            $('.file_div').append(
                `
                <input type="file" name="file" class="form-control-file file_input">
                `
            )
        })
        .on('click','._close',function(){
            $('.modal').modal('hide');
            $('#review_modal .modal-body').html(
                `<div class="form-group">
                        <p class="m-0">이름</p>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="m-0">구매처</p>
                        <input type="text" name="shop" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="m-0">구매품</p>
                        <input type="text" name="product" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="m-0">구매일</p>
                        <input type="date" name="date" class="form-control">
                    </div>
                    <div class="form-group">
                        <p class="m-0">내용</p>
                        <textarea name="contents" id="contents" cols="30" rows="4" class="form-control"></textarea>
                    </div>
                    <span class="position-relative star" style="font-size: 2rem;color: #cccccc">
                        ★★★★★
                        <span class="position-absolute asdf" style="left: 0;width: 0;color: #ffcc33;overflow: hidden;cursor: pointer">★★★★★</span>
                        <input type="range" name="score" id="score" step="1" max="10" min="1" value="1" style="left: 0;z-index:3;opacity: 0;" class="position-absolute w-100 h-100">
                    </span>
                    <div class="file_div">
                        <input type="file" name="file" id="file" class="form-control-file file_input">
                    </div>`
            )
        })
        .on('click','.review_submit', async function(){
            const shop = $('input[name="shop"]').val();
            const name = $('input[name="name"]').val();
            const product = $('input[name="product"]').val();
            const date = $('input[name="date"]').val();
            const contents = $('#contents').val();
            const score = $('input[name="score"]').val();
            const file_id = $('#file').val();
            if(!name || !shop || !product || !date || !contents || !score || !file_id)return alert('필수 입력값이 누락되었습니다.');
            if(name.length < 2)return alert('이름은 2글자 이상이여야 합니다.');
            if(name.length > 50)return alert('이름은 50글자 이하이여야 합니다.');
            const nameReg = /^[ㄱ-ㅎ가-힣a-zA-Z]+$/g;
            if(!nameReg.test(name))return alert('이름은 한글 또는 영문만 포함가능합니다.');
            if(contents.length < 100) return alert('내용은 100자 이상이여야 합니다.');
            let file_arr = document.querySelectorAll('.file_input');
            let files = [];
            for(let i = 0 ; i < file_arr.length;i++){
                let file = await fileRead(file_arr[i].files[0]);
                let img = await draw($(`<img src="${file}" alt="">`)[0]);
                files.push(img);
                console.log(img);
            }
            $.ajax({
                data : {
                    shop,
                    product,
                    date,
                    contents,
                    name,
                    score,
                    files,
                    _token : $('#csrf').attr('content'),
                },
                type : 'post',
                url : '/review',
                success:function (res){
                    alert(res[0]);
                },
                error: function(a){
                    console.log(a.responseText);
                }
            })
        })
        .on('mousemove click','.star input',function(e){
            this.value = Math.floor(e.offsetX/15);
            document.querySelector('.asdf').style.width = `${this.value * 10}%`;
        })
        .on('click','.card_event',function(){
            if(!clickAble) return;
            if(this === removeEle) return;
            clickAble = false;
            this.classList.add('change');
            history.push($(this).attr('data-id'));

            if(history.length === 1){
                setTimeout(()=>{
                    if(this === removeEle && history.length === 1){
                        this.classList.remove('change');
                        removeEle = null;
                        history = [];
                    }
                },3000);
                clickAble = true;
                removeEle = this;
            }
            if(history.length === 2){
                if(history[1] === history[0]){
                    this.classList.add('end');
                    removeEle.classList.add('end');
                    $(this).find('p')[0].classList.remove('d-none');
                    $(removeEle).find('p')[0].classList.remove('d-none');
                    cnt++;
                    if(cnt===8)endGame();
                    clickAble = true;
                }else{
                    setTimeout(()=>{
                        this.classList.remove('change');
                        removeEle.classList.remove('change');
                        clickAble = true;
                    },1000)
                }
                history = [];
            }

        })
        .on('click','.start',function(){
            count();
            cardView(5000);
            this.classList.add('d-none');
            $('.reload')[0].classList.remove('d-none');
        })
        .on('click','.reload',async function(){
            history = [];
            checkAble = false;
            cnt = 0;
            removeEle = null;
            await cardSet();
            await count();
            await cardView(5000);
        })
        .on('click','.hint',function(){
            cardView(3000);
        })
        .on('keyup keydown','input[name="phone"]',function(){
            let val = $(this).val();
            if(val.length > 13)return this.value = val.slice(0,13);
            this.value = val.replace(/[^0-9]/g,'').replace(/(\d{0,3})(\d{0,4})(\d{0,4})$/g,'$1-$2-$3').replace(/\-{1,2}$/g,'');
            
        })
        .on('onpaste','input[name="phone"]',function(){
            console.log('a');
        })
        .on('click','.card_submit',function(){
            const name = $('input[name="name"]').val();
            const phone = $('input[name="phone"]').val();
            const score = $('input[name="score"]').val();
            if(!name || !phone) return alert('필수입력값이 누락되었습니다.');
            if(name.length < 2)return alert('이름은 2글자 이상이여야 합니다.');
            if(name.length > 50)return alert('이름은 50글자 이하이여야 합니다.');
            const nameReg = /^[ㄱ-ㅎ가-힣a-zA-Z]+$/g;
            if(!nameReg.test(name))return alert('이름은 한글 또는 영문만 포함가능합니다.');
            if(phone.length < 13)return alert('핸드폰 번호 형식으로 제출해주세요');
            $.ajax({
                data : {
                    phone,
                    name,
                    score,
                    _token : $('#csrf').attr('content'),
                },
                type : 'post',
                url : '/event',
                success:function (res){
                    alert(res[0]);
                    $('.stamp img')[0].src = `./사진/stamp_${res[1]}.png`;
                }
            })
        })
})
async function fileRead(file){
    return new Promise(res=>{
        let reader = new FileReader();
        reader.onload = () =>{
            res(reader.result);
        }
        reader.readAsDataURL(file);
    })
}

async function draw(img){
    let canvas = await $('<canvas>')[0];
    let ctx = canvas.getContext('2d');
    canvas.width = 450;
    canvas.height = 450;
    ctx.drawImage(img,0,0,450,450);
    ctx.textAlign = 'center';
    ctx.textBaseline = 'center';
    ctx.fillStyle = 'rgba(0,0,0,.4)';
    ctx.font = '30px Arial' ;
    ctx.fillText('경상남도 특산품',225,225);
    return canvas.toDataURL();
}
function count(){
    let inter = setInterval(';');
    for( let i = 0 ; i< inter;i++){
        clearInterval(i);
    }
    let time = 90;
    let count = 5;

    let set = setInterval(()=>{
        if(count > 0)$('.time').html(`시작까지 ${count}초`);
        else {
            if(time > 60)$('.time').html(`남은 시간 1분 ${time - 60}초`);
            else $('.time').html(`남은 시간 ${time}초`);
            time--;
        }
        $('.cnt').html(`찾은 카드 : ${cnt} / 8`)
        count--;
        if(time === 0) {
            endGame();
            clearInterval(set);
        }
    },1000)
}

function cardView(time){
    clickAble = false;
    let card = document.querySelectorAll('.card_event');
    card.forEach((e,idx)=>{
        setTimeout(()=>{
            e.classList.add('change');
        },100 * idx)
        setTimeout(()=>{
            e.classList.remove('change');
            clickAble = true;
        },time + 100 * idx)
    })
}

function endGame(){
    $('input[name="score"]').val(cnt);
    $('#card_modal').modal('show');
    $('.end').css('border','2px solid red');
    $('.card_event p').removeClass('d-none');
    let card = document.querySelectorAll('.card_event');
    card.forEach((e,idx)=>{
        setTimeout(()=>{
            e.classList.add('change');
        },100 * idx)
    })
}

async function cardSet(){
    const data = await cardLoad();
    let text = '';
    data.forEach((e,idx)=>{
        text += `
        <div class="card">
            <div class="card_event w-100 h-100 position-relative" data-id="${e.area}">
                <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center"><img
                        src="./사진/card.png" alt=""></div>
                <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                    <img src="./특산품/${e.area}_${e.most}.jpg" alt="" class="position-absolute w-100 h-100">
                    <p class="d-none">${e.area}</p>
                </div>
            </div>
        </div>
        `
    })
    $('.card_list').html(text);
}

async function cardLoad(){
    let json = await fetch('./js/data.json').then(res=>res.json());
    let data = json.sort(()=>Math.random() - .5).slice(0,8);
    const arr = [...data,...data];
    return arr.sort(()=>Math.random() - .5);
}
