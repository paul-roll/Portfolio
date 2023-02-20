<?php
	include("inc/header.php");
?>

        <main>
            
            <section class="portfolio">
                
                <div class="wrapper">
                    <a id="portfolio"></a>
                    <h2>My Portfolio</h2>
                    <div class="flex-container">
                    
                        <div>
                            <a href="https://netmatters.paul-roll.netmatters-scs.co.uk" target="_blank">
                                <img src="img/Netmatters-Reflection.jpg" alt="Netmatters Website Image">
                                <h3>Netmatters Reflection</h3>
                                <p class="view">View Project <i class="fa-solid fa-arrow-right"></i></p>
                                <p>Developed and rebuilt a mirror of the Netmatters homepage using HTML, SASS, JavaScript, PHP and SQL.</p>
                                <p>Some areas of focus were responsive design, consistent margins and cross-browser compatibility.</p>
                            </a>
                        </div>

                        <div>
                            <a href="https://javascript-array.paul-roll.netmatters-scs.co.uk" target="_blank">
                                <img src="img/JavaScript-Array-Reflection.jpg" alt="JavaScript Project Image">
                                <h3>JavaScript Array Reflection</h3>
                                <p class="view">View Project <i class="fa-solid fa-arrow-right"></i></p>
                                <p>Developed a JavaScript project to fetch random images and assign them to validated email addresses.</p>
                                <p>These images are stored in a multidimensional array and can easily be deleted or re-ordered.</p>
                            </a>
                        </div>

                        <div>
                            <a href="https://laravel.paul-roll.netmatters-scs.co.uk" target="_blank">
                                <img src="img/Laravel-Reflection.jpg" alt="Laravel Project Image">
                                <h3>Laravel Reflection</h3>
                                <p class="view">View Project <i class="fa-solid fa-arrow-right"></i></p>
                                <p>TODO...</p>
                                <p>TODO...</p>
                            </a>
                        </div>

                        <div class="placeholder hidden show-md hide-lg">
                            
                        </div>

                    </div>
                </div>         
            </section>
<?php
    include("inc/contact.php");
	include("inc/footer.php");
	include("inc/footer2.php");
?>