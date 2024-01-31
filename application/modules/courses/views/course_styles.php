
<style type="text/css">
  
  @import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,800|Merriweather:300);
@import url(https://markmurray.co/codepen/customstyle.css);
*, *:before, *:after {
  -moz-box-sizing: border-box;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
}

a, a:visited {
  display: block;
  text-decoration: inherit;
  color: inherit;
}

html, body {
  font-family: 'Open Sans', sans-serif;
  font-size: 100%;
  background: #e2e5eb;
}

.container {
  padding: 1em 1em 1em;
  max-width: calc(1400px + 1em);
  margin: 0 auto;
  overflow: hidden;
}
.container .blog-posts .featured {
  width: 100% !important;
  height: 250px !important;
  margin: 0.5em 0 1em 0 !important;
}
.container .blog-posts .featured .image {
  height: 250px !important;
}
.container .blog-posts .featured .content {
  height: 250px !important;
}
.container .blog-posts .row {
  display: flex;
  flex-wrap: wrap;
}
.container .blog-posts .row .post3:last-child {
    margin-right: 0 !important;
}
.container .blog-posts .post {
  flex: 2;
  overflow: hidden;
  background: white;
  height: 200px;
  -moz-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2);
  margin-right: 1em;
  margin-bottom: 1em;
  min-width: 49.2%!important;
  max-width: 100%!important;
  display: inline-block;
}

.container .blog-posts .post2 {
  flex: 2;
  overflow: hidden;
  background: white;
  height: 200px;
  -moz-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2);
  -webkit-box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2);
  box-shadow: 0 0 2px 0 rgba(0, 0, 0, 0.2);
  margin-right: 1em;
  margin-bottom: 1em;
  min-width: 47%!important;
  max-width: 100%!important;
  display: inline-block;
}
.container .blog-posts .post:hover {
  -moz-box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.1);
  box-shadow: 0 0 3px 2px rgba(0, 0, 0, 0.1);
}
.container .blog-posts .post:hover .image {
  opacity: 0.8;
}
.container .blog-posts .post .image, .container .blog-posts .post .content {
  display: inline-block;
  position: relative;
  -moz-transition: all 500ms ease;
  -o-transition: all 500ms ease;
  -webkit-transition: all 500ms ease;
  transition: all 500ms ease;
}
.container .blog-posts .post .image {
  float: left;
  width: 50%;
  height: 200px;
  background-size: cover;
  background-position: center center;
}
.container .blog-posts .post .image .time {
  background: rgba(255, 255, 255, 0.5);
  width: 120px;
  text-align: center;
  padding: 0.5em 0;
  color: #FF5252;
}
.container .blog-posts .post .image .time .date {
  font-weight: bolder;
}
.container .blog-posts .post .image .time .month {
  font-size: 0.7rem;
}
.container .blog-posts .post .content {
  padding: 0.5em 1em;
  width: 50%;
  -moz-box-shadow: -2px 0 2px -1px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: -2px 0 2px -1px rgba(0, 0, 0, 0.1);
  box-shadow: -2px 0 2px -1px rgba(0, 0, 0, 0.1);
  height: 200px;
}
.container .blog-posts .post .content:before {
  content: '';
  position: absolute;
  background: white;
  width: 10px;
  height: 10px;
  top: 20%;
  left: -5px;
  -moz-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  -webkit-transform: rotate(45deg);
  transform: rotate(45deg);
  -moz-box-shadow: -1px 0 2px -1px rgba(0, 0, 0, 0.1);
  -webkit-box-shadow: -1px 0 2px -1px rgba(0, 0, 0, 0.1);
  box-shadow: -1px 0 2px -1px rgba(0, 0, 0, 0.1);
}
.container .blog-posts .post .content h3 {
  font-weight: 600;
  line-height: 2;
  white-space: nowrap;
  overflow: hidden;
  text-overflow: ellipsis;
}
.container .blog-posts .post .content p {
  font-weight: 300;
  font-size: 0.9rem;
  line-height: 1.5;
  margin-bottom: 0.5em;
  font-family: sans-serif;
}
.container .blog-posts .post .content .meta .icon-comment {
  font-size: 0.7em;
  line-height: 2;
  margin-top: auto;
}

[class^="icon-"]:before {
  margin-right: 0.5em;
  color: #3498db;
}

img {
  max-width: 100%;
  height: auto;
}

@media screen and (max-width: 840px) {
  /*.row {
    display: block !important;
  }*/
  .row .post {
    min-width: 100%!important;
    margin: 0;
  }
  .row .post2 {
    min-width: 100%!important;
    margin: 0;
  }
}
@media screen and (max-width: 600px) {
   .row .post {
    min-width: 100%;
    margin: 0;
    flex: 1;
  }
  .row .post2 {
    flex: 1;
    min-width: 100%;
    margin: 0;
  }

  .content {
    width: 70% !important;
  }

  .image {
    width: 30% !important;
  }
  h1 {
    text-overflow: inherit;
    white-space: normal;
  }
}
/* clearfix */
.cf:before,
.cf:after {
  content: " ";
  /* 1 */
  display: table;
  /* 2 */
}

.cf:after {
  clear: both;
}





</style>
