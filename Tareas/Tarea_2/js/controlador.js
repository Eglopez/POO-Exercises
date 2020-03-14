var localStorage = window.localStorage;

if(localStorage.getItem('posts')==null){
   posts=[
       {
           usuario:"Luis Perez",
           post:"lorem10 asdafaaaaaaaasfsaffffffffffffasssasdsaffsafsfaasdddddddddddddddasddddddddddddddddddddddddddddddddd",
           fecha:"03/12/2019"
       },
       {
        usuario:"Luis Perez",
        post:"lorem10 asdafaaaaaaaasfsaffffffffffffasssasdsaffsafsfasadfggggggggggggggsaaaaaaaaaaaaaagfhhhhhhhhhhhhhhhhhh",
        fecha:"06/11/2019"
    }
   ];

   localStorage.getItem('posts',JSON.stringify('posts'))
}else{
    posts = JSON.parse(localStorage.getItem('posts'));
}

function showPosts(){
    document.getElementById('post').innerHTML = '';
    for(i=0;i<posts.length;i++){
        document.getElementById('post').innerHTML +=
    `<div class="card col-sm-12 col-lg-4">
            <img class="rounded-circle img-thumbnail" src="profile.jpg">${posts[i].fecha}
            <hr>
            <p class="card-text">${posts[i].post}</p>
    </div>`
    }
}

showPosts();

function addPost(){
    let post = {
        usuario:document.getElementById('user').value,
        post:document.getElementById('text').value,
        fecha:document.getElementById('date').value

    };
    
    posts.push(post);
    console.log(posts);
    localStorage.setItem('posts',JSON.stringify(posts));
    showPosts();
}