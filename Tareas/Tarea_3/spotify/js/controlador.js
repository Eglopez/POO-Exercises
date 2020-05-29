var users = [];
var artists = [];
var selectedArtist;


function verPlaylist(codigoPlaylist){
    console.log('Ver playlist con codigo: ' + codigoPlaylist);

    document.getElementById('vista-playlist').innerHTML = '';
   for(let i=0;i<users.length;i++){
       if(users[i].nombreUsuario==document.getElementById('users').value){
            for(let j=0;j<users[i].playlists.length;j++){
                if(j==codigoPlaylist){
                 let songs = '';
                
                 for(let k=0;k<users[i].playlists[j].canciones.length;k++){
                     songs +=
                     `
                     <div class="row song-item">
                       <div class="col-1"><i class="fas fa-play"></i></div>
                       <div class="col-10">
                         <div class="song-title">${users[i].playlists[j].canciones[k].nombreCancion}</div>
                         <div class="song-description">${users[i].playlists[j].canciones[k].artista} - ${users[i].playlists[j].canciones[k].album}</div>
                       </div>
                       <div class="col-1">
                           <span>3:56</span>
                       </div>
                     </div>
                
                     `;
                 }
                 document.getElementById('vista-playlist').innerHTML +=
                 `
                 <section class="container-fluid">
                     <div class="row">
                       <div class="col-4 text-center">
                         <h5>${users[i].playlists[j].tituloPlaylist}</h5>
                         <div class="cover-image">
                             <i class="fas fa-music fa-9x"></i>
                         </div>
                         <button class="btn btn-success"type="button">Play</button>
                       </div>
                       <div class="col-8">${songs}</div>
                     </div>
                 </secction><hr>      
             
                 `;
                }
            }
       }
       
   }

    $("#vista-playlist").show();
    $("#vista-artista").hide();
}

function verArtista(codigoArtista){
    console.log('Ver artista con codigo: ' + codigoArtista);
    selectedArtist = codigoArtista;
    document.getElementById('vista-artista').innerHTML = '';
    for(let j=0;j<artists[codigoArtista].albumes.length;j++){
        let songs = '';
        for(let k=0;k<artists[codigoArtista].albumes[j].canciones.length;k++){
            songs += 
            `   
                <!--Item 1 -->
                <div class="row song-item">
                  <div class="col-1"><i class="fas fa-play"></i></div>
                  <div class="col-10">
                    <div class="song-title"${artists[codigoArtista].albumes[j].canciones[k].nombreCancion}></div>
                      <div class="song-description">${artists[codigoArtista].nombreArtista} - ${artists[codigoArtista].albumes[j].nombreAlbum}</div>
                  </div>
                  <div class="col-1">
                      <span>${artists[codigoArtista].albumes[j].canciones[k].duracion}</span>
                      <button onclick="agregarCancion(${k})" class="btn btn-outline-success btn-sm" title="Agregar a playlist"><i class="fas fa-plus"></i></button>
                  </div>
                </div>
            `;
            
        }
        document.getElementById('vista-artista').innerHTML +=
        `
        <section class="container-fluid">
            <div class="row">
                <div class="col-4 text-center">
                    <div class="cover-image" style="background-image:url(${artists[codigoArtista].albumes[j].caratulaAlbum});">
                    </div><br>
                    <h5 class="text-muted">${artists[codigoArtista].albumes[j].nombreAlbum}</h5>
                    <button class="btn btn-success"type="button">Play</button>
                </div>
                <div class="col-8">${songs}</div>
            </div>
        </section><hr>   
        
        

        `;

    }
   
        
    

    $("#vista-artista").show();
    $("#vista-playlist").hide();
}

function agregarCancion(codigoCancion){
    console.log("Agregar cancion "+codigoCancion);
    $("#modal-playlists").modal('show');
}

function getUsers(){
    axios({
        method: 'GET',
        url: 'api/users.php',
        responseType: 'json',
    }).then(res =>{
        users = res.data;
        console.log(res);
        showUsers();
        showPlaylists();
    }).catch(error =>{
        console.error(error);
    });
}

getUsers();

function showUsers(){
    document.getElementById('users').innerHTML ='';
    for(let i=0;i<users.length;i++){
        document.getElementById('users').innerHTML +=
        ` 
        <option>${users[i].nombreUsuario}</option>
        `;
    }
    
}

function getArtists(){
    axios({
        method: 'GET',
        url: 'api/artists.php',
        responseType:'json'
    }).then(res=>{
        artists = res.data;
        console.log(res);
        showArtists();
        
    }).catch(error=>{
        console.error(error);
        
    });
    
}

getArtists();

function showArtists(){
    console.log(artists)
    document.getElementById('artists').innerHTML = '';
    for(let i=0;i<artists.length;i++){
        document.getElementById('artists').innerHTML +=
        `
        <li class="nav-item"><div class="nav-link" onclick="verArtista(${i})"><i class="fas fa-music"></i>${artists[i].nombreArtista}</div></li>
        `;
    }
}

function showPlaylists(){
    document.getElementById('playlists').innerHTML = '';
    for(let i=0;i<users.length;i++){

       if(users[i].nombreUsuario==document.getElementById('users').value){
        for(let j=0;j<users[i].playlists.length;j++){
            document.getElementById('playlists').innerHTML +=
            `
            <li class="nav-item"><div class="nav-link" onclick="verPlaylist(${j})"><i class="fas fa-play"></i>${users[i].playlists[j].tituloPlaylist}</div></li>

            `;
        }   
       }
    }
}

function selectUser(){
    showPlaylists();
    $('#modal-usuarios').modal('hide');
}

