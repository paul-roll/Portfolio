<?php
	include("inc/header.php");
?>
        
        <main>

            <section class="scs">
                <div class="wrapper">
                    <a id="scs"></a>

                    <h2>Introduction to Scion Coalition Scheme</h2>
                    <p>The Scion Coalition Scheme Boot Camp is an intensive, specially tailored training program being run by Netmatters in order to give willing candidates the opportunity to enter the industry as web developers. Under the supervision of senior web developers, scions generally aim to complete training within sixteen weeks. The course is intensive and therefore the level of learning achieved is extensive in a short space of time.</p>

                    <h2>Treehouse<img src="img/treehouse.jpg" alt=""></h2>
                    <p>Treehouse is an online learning community, featuring videos covering a number of topics from basic HTML to C# programming, iOS development, data analysis, and more. By completing courses users can earn points, allowing them to track their progress and see how much they've covered in certain areas.</p>
                    <p class="treehouse-score"></p>

                    <h2>About Netmatters<img src="img/netmatters.jpg" alt=""></h2>
                    <ul>
                        <li>Established in 2008</li>
                        <li>Norfolk's leading technology company</li>
                        <li>Winner of the Princess Royal Training Award</li>
                        <li>Winner of EDP Skills of Tomorrow Award</li>
                        <li>80+ staff, 2 locations across Norfolk</li>
                        <li>Digital Marketing, Website & Software development & IT Support</li>
                        <li>Broad spectrum of clients, working nationwide</li>
                        <li>Operate to strict company values</li>
                    </ul>
                    
                </div>
            </section>
<?php
    include("inc/contact.php");
	include("inc/footer.php");
?>
        <script>
            $.getJSON("https://teamtreehouse.com/profiles/paulroll2.json", function(data) {
                $(".treehouse-score").html(`<a href="https://teamtreehouse.com/paulroll2" target="_blank" class="bold">
                    Total Score: ${data["points"]["total"]}<br>
                    Total Badges: ${data["badges"].length}
                </a>`)
            });
        </script>
<?php
	include("inc/footer2.php");
?>