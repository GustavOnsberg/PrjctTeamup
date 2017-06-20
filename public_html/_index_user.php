<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Main page - Project Team-Up</title>
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400" rel="stylesheet">
      <meta name="description" content=“Project Team-Up is a teamup application for entrepenuers. Create teams, projects and start creating with people all around the world.“>
      	<style>
          body{
            margin: 0;
            padding: 0;
            font-family: 'Source Sans Pro', sans-serif;
            font-weight: 300;
            width: 100%;
            height: 100vh;
            margin: auto;
            background-color: #ecf0f1;
          }
          section.top{
            height:100%;
            text-align:center;
            position: relative;
            background: url(./media/bg3.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          section.top div{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size:5em;
            color: #fff;
          }
          section.firstboxes{
            width: 100vw;
            height: 80vh;
            overflow: hidden;
          }
          section.firstboxes > .left{
            width: 50%;
            float: left;
            height: inherit;
            background: url(./media/bg.jpg) no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          section.firstboxes > .left > div{
            width: 90%;
            height: 90%;
            background-color: rgba(255,255,255,0.75);
            display: inline-block;
            padding: 5%;
            position: relative;
          }
          section.firstboxes > div.left > div > div{
            width: 35vw;
            float: left;
            font-size: 1em;
            position: absolute;
            bottom: 5%;
          }
          section.firstboxes > div.left > div > div > h2{
            font-size: 2em;
            margin: 0;
            padding: 0;
          }
          section.firstboxes > .right{
            width: 50%;
            float: left;
            height: inherit;
            background: url(./media/bg.jpg) no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          section.firstboxes > .right > div{
            width: 90%;
            height: 90%;
            background-color: rgba(255,255,255,0.75);
            display: inline-block;
            padding: 5%;
            position: relative;
          }
          section.firstboxes > div.right > div > div{
            width: 35vw;
            float: left;
            font-size: 1em;
            position: absolute;
            bottom: 5%;
          }
          section.firstboxes > div.right > div > div > h2{
            font-size: 2em;
            margin: 0;
            padding: 0;
          }
          section.quotes{
            width: 85vw;
            padding-left: 7.5vw;
            padding-right: 7.5vw;
            padding-top: 10vh;
            padding-bottom: 10vh;
            background: url(./media/water.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          section.quotes > .quotebox{
            width: 50vw;
            margin:auto;
            height: auto;
            overflow: hidden;
            color: #fff;
          }
          section.quotes > .quotebox > div.quoteimage{
            display: inline;
            float: left;
            width: 20%
          }
          section.quotes > .quotebox > div.quoteimage > img{
            background-color: white;
            border-radius: 50%;
            width: 100%;
          }
          section.quotes > .quotebox  div.quotetext{
            display: inline-block;
            float: right;
            font-size: 1.1em;
            line-height: 1.1em;
            width: 70%;
            line-height: 1.2em;
          }
          section.quotes > .quotebox  div.quotetext span{
            font-size: 3em;
            line-height: 2em;
          }
          section.features{
            width: 85%;
            padding-left: 7.5%;
            padding-right: 7.5%;
            padding-top: 20vh;
            height: 80vh;
            background: url(./media/water.jpg) no-repeat center center fixed; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          section.features > div.left{
            width: 40%;
            font-size: 3em;
            float: left;
            color: #fff;
          }
          section.features > div.right{
            width: 60%;
            float: right;
            text-align: right;
          }
          section.features > div.right > img{
            width: 100%;
          }
          section.steps{
            width: 85vw;
            padding-top: 5%;
            padding-bottom: 5%;
            margin: auto;
            overflow: hidden;
          }
          section.steps > div.boxes > div{
            width: 33.333%;
            float: left;
            text-align: center;
          }
          section.steps > div.boxes > div > p{
            line-height: 2em;
            padding: 0;
            margin: 0;
          }
          section.steps > div.boxes > div > p > span{
            font-size: 2em;
            color:#3498db;
          }
          section.steps > div.boxes > div > img{
            border-radius: 50%;
            width: 50%;
            background-color: #bdc3c7;
          }
          section.threeprojects{
            height: 75vh;
          }
          .threeprojects > p{
            font-size: 3em;
            text-align: center;
          }
          section.threeprojects > div.threeprojects{
            height:100%;
          }
          section.threeprojects > div.threeprojects > a > div{
            position: relative;
            width: 33.333333%;
            float: left;
            height: 100%;
            color: #fff;
          }
          .threeprojectsone{
            background: url(./media/bg.jpg) no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          .threeprojectstwo{
            background: url(./media/bg5.jpg) no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          .threeprojectsthree{
            background: url(./media/bg6.jpg) no-repeat center center; 
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
          }
          section.threeprojects > div.threeprojects > a > div > div{
            background-color: rgba(0,0,0,0.4);
            height: 93%;
            padding: 4%;
            transition: all 0.5s;
            -moz-transition: all 0.5s; /* Firefox 4 */
            -webkit-transition: all 0.5s; /* Safari and Chrome */
            -o-transition: all 0.5s; /* Opera */
          }
          section.threeprojects > div.threeprojects > a > div:hover > div{
            background-color: rgba(255,255,255,0.8);
            color: #000;
          }
          section.threeprojects > div.threeprojects > a > div > div > img{
            height: 0.8em;
            margin-right: 1%;
          }
          section.threeprojects > div.threeprojects > a > div > div > p{
            line-height: 1.5em;
            display: inline-block;
            padding: 0;
            margin: 0;
            color: #fff;
          }
          section.threeprojects > div.threeprojects > a > div > div > div.box{
            position: absolute;
            bottom: 5%;
          }
          section.threeprojects > div.threeprojects > a > div > div > div.box > p{
            padding: 0;
            margin: 0;
            line-height: 1em;
          }
          section.threeprojects > div.threeprojects > a > div > div > div.box > p.header{
            font-size: 2em;
            line-height: 1.5em;
          }
          section.search{
            height: auto;
            width: 75vw;
            padding-top: 5vh;
            padding-bottom: 5vh;
            margin: auto;
          }
          section.search .search{
            width: 100%;
            border: 0;
            font-size: 5em;
            margin-top: 2%;
            background-color: #ecf0f1;
          }
          section.search .search:focus {
              outline:none;
          }
      </style>
    </head>
    <body>
      	<section class="top">
          <div>Team-Up now!</div>
        </section>
        <!--for logged in users start-->
        <section class="search">
          Search for Projects, Authors, Groups, Categories or Roles
          <!--Search box here-->
          <input class="search" type="search" placeholder="Start typing...">
        </section>
        <!--for logged in users end-->
        <!--<section class="features">
          <div class="left">
            Some text
          </div>
          <div class="right">
            <img src="com.png">
          </div>
        </section>-->
        <section class="threeprojects">
          <p>Selected Projects</p>
          <div class="threeprojects">
            <a href="#">
              <div class="threeprojectsone">
                <div>
                  <img src="./media/eye.png"><p>Most Viewed</p>
                  <div class="box">
                    <p class="header">Project Name</p>
                    <p>By Someone</p>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="threeprojectstwo">
                <div>
                  <img src="./media/arrow.png"><p>Top Trending</p>
                  <div class="box">
                    <p class="header">Project Name</p>
                    <p>By Someone</p>
                  </div>
                </div>
              </div>
            </a>
            <a href="#">
              <div class="threeprojectsthree">
                  <div>
                    <img src="./media/trophy.png"><p>Project of the month</p>
                    <div class="box">
                      <p class="header">Project Name</p>
                      <p>By Someone</p>
                    </div>
                  </div>
              </div>
            </a>
          </div>
        </section>
    </body>
</html>
