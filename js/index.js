const all = document.querySelector('#lyrow');
const c = all.querySelectorAll('.htit');
const d = all.querySelectorAll('.textbox');
const Time = all.querySelectorAll('.stime');
const tittle_box = all.querySelector('.tittle_box');
const titbtuu = tittle_box.querySelectorAll('a');
const Scroll = all.querySelector('.conscroll');
const newsimg = all.querySelectorAll('.new_img');

// 获取新闻数据
function ajax(url){
    let promise = new Promise((resolve,reject)=>{
        let xhr = new XMLHttpRequest();
        xhr.open('get',url,true);
        xhr.onreadystatechange = ()=>{
            if(xhr.readyState == 4){
                if(xhr.status >= 200 && xhr.status <300){
                    resolve(xhr.response);
                } else{
                    reject(new Error(xhr.statusText));
                }
            }
        };
        xhr.send(null);
    });
    return promise;
}

// 渲染数据
ajax('../LT教育updat/NewsSystem/info.json')
    .then(response => {
        a = JSON.parse(response);
        for (let i = 0; i <= 2; i++) {
            c[i].innerHTML = `<h1 class="htit">${a.data[i].title}</h1>`;
            d[i].innerHTML = `<span class="textbox">${a.data[i].content}</span>`;
            Time[i].innerHTML = `${a.data[i].createtime}`;
            newsimg[i].innerHTML = `<img src="${a.data[i].imgurl}" class="nimg">`;
        }
    })
    .catch(statusText => {
        console.log(statusText);
    });


    // 标签切换
for(let i=0 ; i<titbtuu.length;i++){
    titbtuu[i].onclick=()=>{
        titbtuu[i].className = 'addcss';
        for(let x=0;x<titbtuu.length;x++){
            if(x == i){
                continue;
            }else{
                titbtuu[x].className = 'oncss';
            }
        }
    }
}