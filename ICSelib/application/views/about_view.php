<?php include "includes/header.php"; ?>

<?php include "includes/navigation_bar.php"; ?>

<body>
  <!-- Wrap all page content here -->
  <div class="width_limit"> 
        <div id="pics">
          <img src=<?php echo "\"".base_url()."assets/resize/1.jpg"."\"";?>>
          <img src=<?php echo "\"".base_url()."assets/resize/2.jpg"."\"";?>>
          <img src=<?php echo "\"".base_url()."assets/resize/6.jpg"."\"";?>>
          <img src=<?php echo "\"".base_url()."assets/resize/7.jpg"."\"";?>>
          <img src=<?php echo "\"".base_url()."assets/resize/9.jpg"."\"";?>>
        </div>
        <div class="content main">
            <ul class="nav nav-tabs" id="about_tab">
             <li class="active"><a href="#mission" data-toggle="tab">Mission</a></li>
             <li><a href="#vision" data-toggle="tab">Vision</a></li>
             <li><a href="#history" data-toggle="tab">History</a></li>
             <li><a href="#aboutICS" data-toggle="tab">About ICS</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane fade in active" id="mission">
                <fieldset>
                  <h2 style="color: #428bce;">Mission</h2>
                  <ul>
                  <li><p align="justify">To produce the needed quality manpower for the software industry of the Philippines and the manpower needed to carry out the information processing functions of private and government institutions.</p></li>
                  <li><p align="justify">To carry out high-level research and development in computer science and computer hardware so as to enhance locally produced computer products.</p></li>
                  <li><p align="justify">To continuously upgrade the computing personnel of industry and government through training.</p></li>
                  </ul>
                </fieldset>
              </div>
              <div class="tab-pane fade" id="vision">
                <fieldset>
                  <h2 style="color: #428bce;">Vision</h2>
                  <ul><li><p>To become the National Center of Excellence in Computer Science.</p></li></ul>
                </fieldset>
              </div>
              <div class="tab-pane fade" id="history">
                <fieldset>
                  <h2 style="color: #428bce;">History</h2>
                  <p align="justify">In the year 1982, Computer Science was first recognized as a discipline in UPLB. It was when the Institute of Mathematical Science and Physics (IMSP) was established. Division of Computer Science, one of its divisions, was first headed by Prof. Wilfredo Cabezon.
        Along with the establishment of the Division of Computer Science was the institution of the BS Computer Science curriculum in the university and the first students of the curriculum were admitted in the year 1983.
        The first instructors and professors of the curriculum were known professors and instructors in Statistics namely Dr. Manuel M. Manuel, Prof. Wilfredo E. Cabezon, and Dr. Eliezer A. Albacea (Instructor then).
        Through the help of the International Development Program (IDP) of Australian Universities and Colleges,  The Division’s initial staff of three grew to about ten with graduate degrees in Computer Science.
        The Master in Science in Computer Science was instituted by the division in the year 1988.<br><br>
        Division of Computer Science was separated from IMSP in January 26, 1995. The UP Board of regents decided to merge it with the existing Los Banos Computer Center which leads to the birth of the Institute of Computer Science (ICS). It all takes place when Dr. Eliezer A. Albacea was the Head of the Division, Dr. Ruben Villareal was the Chancellor of UPLB and Dr. Emil Q. Javier was the President of UP. Dr. Eliezer A. Albacea became the first Director of ICS.
        A year later, the Institute was designated by the Board of Regents as a pilot institute to implement the concept of a System Academic Program. Dr. Eliezer A. Albacea was designated System Director for the UP System Computer Science Program. ICS is instrumental in the institution of BSCS programs in UP Manila, UP in the Visayas (Cebu, Tacloban, and Iloilo), UP College Baguio, and UP Mindanao.
        In 1996, ICS instituted the Diploma in Computer Science both in residential and distance education modes while in 1998, the Ph.D. in Computer Science was instituted. In 2002, the Master of Information Technology was instituted.</p>
                </fieldset>
              </div>
              <div class="tab-pane fade" id="aboutICS">
                <fieldset>
                  <h2 style="color: #428bce;">About ICS</h2>
                  <p align="justify">Welcome to the Institute of Computer Science library. Where we believe that enthrallment with the Library's collection and engagement with its staff is the best way for academic excellence for not just UPLB Computer Science majors, but also constituents whose curiosity is built up regarding the field. We recognize the service given by our library as our best interest, as we have been doing for the past few years. And we're still going to continue pursuing our service with all excellence and strive to be better at it for all ways.</p>
                  <p align="justify">Since its establishment, the ICS Library has catered the need of Computer Science students with its vast collection of books, SPs, Theses, and other reading materials associated with the field. For years, it has been a site for research, studies, and the like and it continues to strengthen its reputation as a place of learning up until today. The history engraved in all materials held by the library each has story to tell. The library had witnessed the making of great Computer Scientists, thus, making it a haven for crucial developments. Us and the library's goal of helping the students as much as it can still in effect.</p>
                </fieldset>
              </div>
            </div>
          </div>
        </div>        
    </div>
    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src=<?php echo "\"".base_url()."assets/jquery-2.0.3.js"."\""?>></script>
    <script src=<?php echo "\"".base_url()."assets/dist/js/bootstrap.min.js"."\""?> ></script>
    <script src=<?php echo "\"".base_url()."assets/docs-assets/js/holder.js"."\""?> ></script>
    <script>
      $(function () {
      $('#about_tab a:first').tab('show')
      })
    </script>
  </body>
</html>