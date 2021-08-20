<?php

 ?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!--jquery cdn-->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  	<title>Welcome  to Sohini_Jazeera</title>
  </head>
  <body>
    <?php

    ?>
    <nav class="navbar bg-danger">
      <h3 class="navbar-brand">Country News</h3>
    </nav>
    <div class="jumbotron">
      <div class="row">
        <div class="offset-md-3 col-md-6">
          <h1 class="text-md-center font-italic text-danger">Access Your News</h1><br>
          <input type="text" class="form-control " name="" id="term"><br>
          <button class="btn btn-danger btn-block" id="search">Search</button>
        </div>
      </div>
    </div>

    <div class="conatiner">
      <div class="row" id="result"></div>
    </div>

  </body>
    <script type="text/javascript">
      console.log("This is my file");
      $(document).ready(function()
      {
        //console.log("This is my file");
        $('#search').click(function(){
          var term=$('#term').val();
          //alert(term)https://newsapi.org/v2/everything?q=bitcoin&apiKey=f50c79ab01e54d8abfacb1592d98cafb;
          $.ajax
          ({
            url:'https://newsapi.org/v2/everything?q='+ term +'&apiKey=f50c79ab01e54d8abfacb1592d98cafb',
            success:function(data){
                //console.log(data.articles[i].title);
                $('#result').empty();
                for(var i in data.articles)
                {
                //console.log(data.articles[i].title);
                  $('#result').append('<div class="col-md-4" style="margin-top: 20px"><div class="card"><div class="card-body"><img style="height:350px; width:350px; padding-left:60px" src="'+data.articles[i].urlToImage+'"><h4  class="card-title my-3">'+data.articles[i].title+'</h4><p class="card-text">'+data.articles[i].description+'</p><a href="'+data.articles[i].url+'" class="btn btn-danger btn-block" target="_blank">Read More</a></div></div></div>');  
                }

            },
            error: function(){
              alert("Some error");
            } 

          })

        })
        $.ajax
        ({
          url:"https://newsapi.org/v2/top-headlines?sources=the-times-of-india&apiKey=f50c79ab01e54d8abfacb1592d98cafb",
          success:function(data)
          {
            //console.log(data);
            for(var i in data.articles)
            {
                //console.log(data.articles[i].title);
                $('#result').append('<div class="col-md-4" style="margin-top: 20px"><div class="card"><div class="card-body"><img style="height:350px; width:350px; padding-left:60px" src="'+data.articles[i].urlToImage+'"><h4  class="card-title my-3">'+data.articles[i].title+'</h4><p class="card-text">'+data.articles[i].description+'</p><a href="'+data.articles[i].url+'" class="btn btn-danger btn-block" target="_blank">Read More</a></div></div></div>');  
            }
          },
          error:function(){
            alert("Some error");
          }
        })
      })
    </script>
</html>