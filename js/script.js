clickAble = false;
cnt = 0;
let history = [];
removeEle = null;


$(()=>{
    cardSet();
    $(document)
        .on('click','.view',function(){
            const id = $(this).attr('data-id');
            $.ajax({
                data : {
                    _token : $('meta[name="csrf"]').attr('content'),
                    id
                },
                type : 'post',
                url : '/view',
                success : function(res){const name = $('input[name="name"]').val();
                    $('#view input[name="product"]').val(res[0].product);
                    $('#view input[name="name"]').val(res[0].name);
                    $('#view input[name="shop"]').val(res[0].shop);
                    $('#view input[name="date"]').val(res[0]['purchase-date']);
                    $('#view textarea[name="contents"]').val(res[0].contents);
                    $('#view span span')[0].style.width = `${res[0].score * 10}%`;
                    $('.file_list').html(' ')
                    res[1].forEach(e=>{
                        $('.file_list').append(
                            `<img src="${e.file_name}" style="width: 50px; height: 50px">`
                        )
                    })
                    $('.back_page').attr('data-id',res[0]['id']-1);
                    $('.next').attr('data-id',res[0]['id']+1);
                }
            })
        })
        .on('click','.close',function(){
            $('.modal').modal('hide');const name = $('input[name="name"]').val();
            $('input[name="product"]').val('');
            $('input[name="shop"]').val('');
            $('input[name="date"]').val('');
            $('textarea[name="contents"]').val('');
            $('input[name="score"]').val('');
            $('#file').val('');
            document.querySelector('.star span').style.width = `0%`;

        })
        .on('click','.review_submit',async function(){
            const name = $('input[name="name"]').val();
            const product = $('input[name="product"]').val();
            const shop = $('input[name="shop"]').val();
            const date = $('input[name="date"]').val();
            const contents = $('textarea[name="contents"]').val();
            const score = $('input[name="score"]').val();
            const file = $('#file').val();

            if(!name|| !product || !shop || !date || !contents || !score || !file)return alert('필수 입력값이 누락되었습니다.');
            if(name.length < 2) return alert('이름은 두글자 이상입니다.');
            if(name.length > 50) return alert('이름은 50자 이하입니다.');
            const nameReg = /^[ㄱ-ㅎ가-힣a-zA-Z]+$/;
            if(!nameReg.test(name))return alert('이름은 한글과 영문으로만 입력 가능합니다.');
            let filees = document.querySelectorAll('.file_input');
            let files = [];
            for(let i = 0; i < filees.length; i++){
                let data = await readFile(filees[i].files[0]);
                let img = await drawImg($(`<img src="${data}" alt=""/>`)[0]);
                files.push(img);
            }
            $.ajax({
                data : {
                    _token : $('meta[name="csrf"]').attr('content'),
                    name,
                    product,
                    shop,
                    'purchase-date' : date,
                    contents,
                    score,
                    files
                },
                url : '/api/reviews',
                type : 'post',
                success : function(res){
                    let text = '';
                        text += `
                            <div class="review_box d-flex flex-column justify-content-between">
                                <p class="gray">${res[0]['purchase-date']}</p>
                                    <div class="d-flex justify-content-between align-items-end">
                                        <h3>${res[0]['product']}</h3>
                                        <p class="gray">${res[0].name}</p>
                                    </div>
                                    <p class="gray">${res[0].contents.slice(0,50)}</p>
                                    <div class="img_list">`;
                        res[1].forEach(qe=>{
                            text += `<img src="${qe.file_name}" alt="" style="width: 50px;height: 50px;">`
                        })
                        text +=`
                                    </div>
                                    <div class="d-flex justify-content-between">
                                       <span class="star position-relative" style="font-size: 2rem;color: #ccc">
                    ★★★★★
                    <span style="overflow: hidden;width: ${res[0].score * 10}%;color: #fff959;position:absolute;left: 0;cursor:pointer;">★★★★★</span>
                </span>
                                        <button class="btn btn-outline-light view" data-id=${res[0].id}>상세보기</button>
                                    </div>
                                </div>
                            `;
                    $('.review_list').prepend(text);
                    }
                })
            })
        })
        .on('mousemove','.star input',function(e){
            this.value = Math.floor(e.offsetX / 15);
            document.querySelector('.modal .star span').style.width = `${this.value * 10}%`;
        })
        .on('click','.file_add',function(){
            $('.file_div').append(
                `
                <input type="file" name="file" class="form-control-file file_input" accept=".jpg">
                `
            )
        })
        .on('click','.start',function(){
            count();
            cardView(5000);
        })
        .on('click','.hint',function(){
            cardView(3000);
        })
        .on('keyup keydown onpaste','input[name="phone"]',function(){
            let val = $(this).val();
            if(val.length > 13){
                return this.value = val.slice(0,13);
            }
            this.value = val.replace(/[^0-9]/g,'').replace(/(\d{0,3})(\d{0,4})(\d{0,4})$/g,'$1-$2-$3').replace(/\-{1,2}$/g,'');
        })
        .on('click','.card_submit',function(){
            const score = $('input[name="score"]').val();
            const name = $('input[name="name"]').val();
            const phone = $('input[name="phone"]').val();
            if(!name || !phone) return alert('필수 입력값이 누락되었습니다.');
            if(name.length < 2) return alert('이름은 두글자 이상입니다.');
            if(name.length > 50) return alert('이름은 50자 이하입니다.');
            const nameReg = /^[ㄱ-ㅎ가-힣a-zA-Z]+$/;
            if(!nameReg.test(name))return alert('이름은 한글과 영문으로만 입력 가능합니다.');
            if(phone.length < 13) return alert('휴대전화는 13자여야합니다.');
            $('.modal').modal('hide');
            $.ajax({
                data : {
                    _token : $('meta[name="csrf"]').attr('content'),
                    name,
                    score,
                    phone
                },
                type : 'post',
                url : '/api/event/applicants',
                success : function(res){
                    alert(res[0]);
                    $('.stamp')[0].src = `./사진/stamp_${res[1]}.png`;
                }
            })
        })
        .on('click','.card_event',function(){
            if(!clickAble) return;
            if(this === removeEle) return;
            this.classList.add('change');
            history.push($(this).attr('data-id'));
            clickAble = false;
            if(history.length === 1){
                setTimeout(()=>{
                    if(history.length === 1 && removeEle === this){
                        this.classList.remove('change');
                        history = [];
                        removeEle = null;
                    }
                },3000)
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

async function drawImg(img){
    let canvas = await $('<canvas>')[0];
    let ctx = canvas.getContext('2d');
    canvas.width = 450;
    canvas.height = 450;
    ctx.drawImage(img,0,0,450,450);
    ctx.textAlign = 'center';
    ctx.textBaseline = 'center';
    ctx.font = '18px';
    ctx.fillText('경상남도 특산품',225,225);
    return canvas.toDataURL();
}

const readFile = async (img) =>{
    return new Promise(res=>{
        let reader = new FileReader();
        reader.onload=()=>{
            res(reader.result);
        }
        reader.readAsDataURL(img);
    })
}

function endGame(){
    $('#card_modal').modal('show');
    $('input[name="score"]').val(cnt);
}

function count(){
    let time = 90;
    let count = 5;
    let all = setInterval(';');
    for (i =0; i < all;i++){
        clearInterval(i);
    }
    const inter = setInterval(()=>{
        if(count > 0){
            $('.count').html('게임시작까지 : '+ count+ '초');
            count--;
        }else{
            $('.count').html('남은시간 : '+ time+ '초');
            time--;
        }
        if(time < 0){
            clearInterval(inter);
            endGame();
        }
    },1000)
}

function cardView(time){
    clickAble = false;
    const cards = document.querySelectorAll('.card_event');
    cards.forEach((e,idx)=>{
        setTimeout(()=>{
            e.classList.add('change');
        },100*idx)
    })
    cards.forEach((e,idx)=>{
        setTimeout(()=>{
            e.classList.remove('change');
            clickAble = true;
        },time + 100*idx)
    })
}



async function cardSet(){
    let card = await cardLoad();
    let text = '';
    card.forEach((e)=>{
        text += ` <div class="card">
                <div class="card_event w-100 h-100 position-relative" data-id="${e.area}">
                    <div class="front position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./사진/card.png" alt="">
                    </div>
                    <div class="back position-absolute w-100 h-100 d-flex justify-content-center align-items-center">
                        <img src="./특산품/${e.area}_${e.most}.jpg" alt="" class="position-absolute" style="z-index: -3">
                        <p class="d-none">${e.most}</p>
                    </div>
                </div>
            </div>
        `
    })
    $('.card_list').html(text);
}





async function cardLoad(){
    const data = await fetch('./js/data.json').then(res=>res.json());
    const card = data.sort(()=>Math.random() - .5).slice(0,8);
    return [...card,...card].sort(()=>Math.random() - .5);
}
