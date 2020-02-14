$(document).ready(function(){
    $("#register").click(registracija);
    $("#login").click(login);
    $("#search_Movies").keyup(searchMovies);

    showCelebrity();
    showMovies();


});
const pageurl = window.location.href;

function registracija(){
    var username = $("#username").val();
    var email = $("#email").val();
    var pass = $("#pass").val();
    var fname = $("#fname").val();
    var lname = $("#lname").val();

    var regUName = /^[a-z]{2,15}$/;
    var regEmail = /^[A-Za-z\d\!\#\$\%\&\'\*\+\-\/\=\?\^\_\`\{\|\}\~\;\"\(\)\,\:\;\<\>\@\[\\\]\.]{5,}[^\.]*\@(([a-z\d\-]+)\.[\w\d]+)+$/;
    var regPass = /^(?=.*\d).{6,}$/;
    var regFname = /^[A-Z][a-z]{2,20}$/;
    

    var error = [];

    if(!regFname.test(fname.trim())){
		error.push("First Name is not in good format!");
		toastr.error("First Name is not in good format!");
    }
    if(!regFname.test(lname.trim())){
		error.push("Last Name is not in good format!");
		toastr.error("Last Name is not in good format!");
    }
    if(!regUName.test(username.trim())){
		error.push("Username is not in good format!");
		toastr.error("Username is not in good format!");
    };
    if(!regPass.test(pass.trim())){
		error.push("Password is not in good format!");
		toastr.error("Password is not in good format!");
    };
    if(!regEmail.test(email.trim())){
		error.push("Email is not in good format!");
		toastr.error("Email is not in good format!");
    };

    if(error.length==0)
    {
        $.ajax({
            url:'index.php?page=register',
            method:'POST',
            data:{
                uname : username,
                email : email,
                pass : pass,
                fname : fname,
                lname : lname,
                btn : true
            },
            success: function(){
                toastr.success("Successfully registered!");
            },
            error: function (xhr, status, error) {
				console.log(error);
				var statusniKod = xhr.status;

				switch (statusniKod) {
					case 403:
						toastr.error("Access Denied!");
						break;
					case 500:
						toastr.error("Email or Username already exists!");
						break;
					case 422:
						toastr.error("Not valid format!");
						break;
			
					default:
						toastr.error("ERROR!!! Contact administrator!");
						break;
				}
                
            }
        })
    }

}


function login(){
  var username = $("#username").val();
  
  var pass = $("#pass").val();


  var regUName = /^[a-z]{2,15}$/;
  var regPass = /^(?=.*\d).{6,}$/;
  
  

  var error = [];

  if(!regUName.test(username.trim())){
  error.push("Username is not in good format!");
  toastr.error("Username is not in good format!");
  };
  if(!regPass.test(pass.trim())){
  error.push("Password is not in good format!");
  toastr.error("Password is not in good format!");
  };
 

 

}
function showCelebrity(){
    $.ajax({
        url:'index.php?page=printCelebrities',
        dataType:'json',
        method:'get',
        success : function(data){
             printCelebrities(data);

        },
        error : function (xhr, status, error) {
            console.log(error);

        }
    })
}
function printCelebrities(data) {

    let html = '';
    data.forEach(d=>{
       html+= `
    
      <div class="col-md-3 col-sm-4 col-xs-6">
                            <div class="celebrity-item">
                                <div class="thumb-wrap">
                                    <img src="Public/${d.celebrityPhoto}" alt="${d.birthName}">
                                    <div class="thumb-hover">
                                        <a class="celebrity-link" href="index.php?page=celebrity-detail&id=${d.id_celebrity}"></a>
                                    </div>
                                </div>
                                <div class="celebrity-details">
                                    <h4 class="celebrity-name"><a href="index.php?page=celebrity-detail&id=${d.id_celebrity}">${d.birthName}</a></h4>
                                    <p class="celebrity-profession">${d.name_cp}</p>
                                </div>
                            </div>
                        </div>
    
    `;
    })
    $('#allCelebrities').html(html);
}




function searchMovies() {
    let valueSearch = $(this).val();

    $.ajax({
        url: "index.php?page=searchMovies&valueSearch=" + valueSearch,
        method: "GET",
        dataType: "json",
        success: function (data) {
            printMovies(data);
        },
        error: function (xhr, status, error) {
            console.log(error);
        }
    });
}
function showMovies(){
    $.ajax({
        url:'index.php?page=show-movies',
        dataType:'json',
        method:'get',
        success:function(data){
            printMovies(data);
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    })
}
function printMovies(data) {

    let html = '';
    for (let d of data) {
        html += printMovie(d);
    }
    $('#videoLista').html(html);
}

function printMovie(d){
    return `
    
     <div class="video-item">
                        <div class="video-thumb">
                            <img src="${d.moviePicture}" alt="Movie thumb">
                        </div>
                        <div class="video-details">
                            <h3 class="video-title"><a href="index.php?page=movie-detail&id=${d.id_movie}">${d.movieName}</a></h3>
                            <p class="video-release-date">${d.movieYear}</p>
                            <div class="ratings-wrap">
                                <div class="expanded-rating">
                                    
                                    <div class="user-voted">
                                    </div>
                                </div>
                            </div>
                            <div class="video-attributes">
                                <p class="cast"><label>Actors:</label> ${printActors(d.actors)}</p>
                                <p class="duration"><label>Time:</label> ${d.time}</p>
                                <p class="genre"><label>Genres:</label> ${printGenres(d.genre)}</p>
                           
                          
                            </div>
                            
                        </div>
                        
                    </div>
    `;
}

function printActors(d){
    let actors="";


    d.forEach(actor=>{
        actors += actor.birthName + " ";
    });

    return actors;
}
function printGenres(d){
    let genres="";

    d.forEach(genre=>{
        genres += genre.genre_name + " ";
    });

    return genres;
}

$(document).on('click', ".paginate", function(event) {
    event.preventDefault();

    let recentPage = $(this).data('i');
    paginate(recentPage);
});

function paginate(page) {

    $.ajax({
        url: "index.php?page=paginate&pagPage=" + page,
        dataType: "json",
        method: "GET",
        success: function (data) {
            printMovies(data);
        },
        error: function (xhr, status, error) {
            console.log(error);

        }
    });
}
