clickAble = false;
cnt = 0;
let history = [];
removeEle = null;


$(()=>{
    cardSet();
    $(document)
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
        .on('click','.review_submit',function(){
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
        })
        .on('mousemove','.star input',function(e){
            this.value = Math.floor(e.offsetX / 15);
            document.querySelector('.star span').style.width = `${this.value * 10}%`;
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
            if(!name || !!phone) return alert('필수 입력값이 누락되었습니다.');
            if(name.length < 2) return alert('이름은 두글자 이상입니다.');
            if(name.length > 50) return alert('이름은 50자 이하입니다.');
            const nameReg = /^[ㄱ-ㅎ가-힣a-zA-Z]+$/;
            if(!nameReg.test(name))return alert('이름은 한글과 영문으로만 입력 가능합니다.');
            if(phone.length < 13) return alert('휴대전화는 13자여야합니다.');
            alert('이벤트에 참여해주셔서 감사합니다.');
            $('.stamp')[0].src = './사진/stamp_2.png';
            $('.modal').modal('hide');
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

})

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