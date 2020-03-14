var localStorage = window.localStorage;

var canals=[
    {
        canal:"Music",
        descripcion:"La mejor Musica"
    },
    {
        canal:"Anime",
        descripcion:"Epic Anime"
    }
]



if(localStorage.getItem('posts')==null){
    posts=[
        {
            titulo:"Marcha",
            urlCaratula:"img/1.jpg",
            canal:"Deportes",
            visualizaciones:"19k",
            duracion:"3:55",
            subido:"12 hours ago"
        },
        {
            titulo:"Shingeki",
            urlCaratula:"img/2.jpg",
            canal:"Anime",
            visualizaciones:"11M",
            duracion:"3:55",
            subido:"10 hours ago"
        }

    ];

    localStorage.getItem('posts',JSON.stringify(posts))

}else{
    posts = JSON.parse(localStorage.getItem('posts'));
}

console.log(posts);

function showVideos(){
    document.getElementById('videos').innerHTML = '';
    for(i=0;i<posts.length;i++){
        document.getElementById('videos').innerHTML +=
        `<div class="col-sm-12 col-lg-3"> 
            
            <div class="container" id="cont"><img src="${posts[i].urlCaratula}">
            <div class="duration">${posts[i].duracion}</div></div>
            <div class="container">
                <h5>${posts[i].titulo}</h5>
                <p>${posts[i].canal}</p>
                <p id="view">${posts[i].visualizaciones} | ${posts[i].subido}</p>
            </div>
            
        </div>`;
    }
}

showVideos();

function addVideo(){
    let post = {
        titulo:document.getElementById('title').value,
        urlCaratula:document.getElementById('cover').value,
        canal:document.getElementById('canal').value,
        visualizaciones:document.getElementById('views').value,
        duracion:document.getElementById('time').value,
        subido:document.getElementById('update').value

    };
    
    posts.push(post);
    console.log(posts);
    localStorage.setItem('posts',JSON.stringify(posts));
    showVideos();
}