<?php
	include("inc/header.php");
?>
        
        <main>

            <section class="examples">
                <div class="wrapper">
                    <a id="examples"></a>
                    <h2>Coding Examples</h2>
                        <div>
                            <p class="bold">Netmatters Reflection:<br>Mouseover Popup</p>
                            <p>Sassy Cascading Style Sheets</p>
                            <div class="example1 bold">
                                <p>Example<br>(Mouseover Here)</p>
                                <div class="hidden arrow"></div>
                                <div class="hidden box">
                                    <h2>Example Title</h2>
                                    <hr>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur egestas.</p>
                                </div>
                            </div>
                            <pre><code class="language-scss">$arrow-width: 100px;
$box-width: 240px;
.arrow {
        position: absolute;
        color: $color-tuna;
        height: 0;
        width: $arrow-width;
        // 15px above relative object
        bottom: calc(100% + 15px);
        // Align center to relative object
        left: calc(50% - (#{$arrow-width} / 2));
        // Build down pointing arrow / triangle
        border-left: ($arrow-width / 2) solid transparent;
        border-right: ($arrow-width / 2) solid transparent;
        border-top: ($arrow-width / 2) solid;
}
.box {
        position: absolute;
        background-color: $color-tuna;
        width: $box-width;
        // Adjacent above .arrow object
        bottom: calc(100% + (#{$arrow-width} / 2) + 15px);
        // Align center to relative object
        left: calc(50% - (#{$box-width} / 2));
}</code></pre>
                            <p>Style and position a pair of objects for showing content in.</p>
                            <p>Manipulates the way that borders intersect to create a triangle by turning the sides transparent.</p>
                            <p>Uses the calc() function to do math on positions and lengths to calculate the dimensions relative to one another.</p>
                        </div>

                        <div>
                            <p class="bold">Netmatters Reflection:<br>Assigning styles to each icon</p>
                            <p>Sassy Cascading Style Sheets</p>
                            <div class="example2 bold">
                                <p>Example</p>
                                <div>
                                    <div class="bespoke-software"><i class="fa-solid"></i></div>
                                    <div class="it-support"><i class="fa-solid"></i></div>
                                    <div class="digital-marketing"><i class="fa-solid"></i></div>
                                    <div class="telecoms-services"><i class="fa-solid"></i></div>
                                    <div class="web-design"><i class="fa-solid"></i></div>
                                    <div class="cyber-security"><i class="fa-solid"></i></div>
                                    <div class="developer-course"><i class="fa-solid"></i></div>
                                </div>
                            </div>
                            <pre><code class="language-scss">// Maps
$service-colors: (
    'bespoke-software':         #67809F,        // hoki
    'it-support':                     #4183D7,        // havelock-blue
    'digital-marketing':        #2ECC71,        // shamrock
    'telecoms-services':        #D64541,        // valencia
    'web-design':                     #926FB1,        // wisteria
    'cyber-security':             #F62459,        // radical-red
    'developer-course':         #CE4125,        // punch
);

$service-icons: (
    'bespoke-software':         "\f58e",        // grip-vertical
    'it-support':                     "\e163",        // display
    'digital-marketing':        "\f201",        // chart-line
    'telecoms-services':        "\f2a0",        // phone-volume
    'web-design':                     "\f121",        // code
    'cyber-security':             "\f3ed",        // shield-halved
    'developer-course':         "\f19d",        // graduation-cap
);</code></pre>
                        <p>A map of key-pairs to make the values easier to work with and ensure that they are never defined more than once.</p>
                        <pre><code class="language-scss">@mixin icon($service, $font-size) {
    &::before {
            font-size: $font-size;
            content: map-get($service-icons, $service);
    }
}</code></pre>
                        <p>A simple mixin that takes a service name and maps the appropriate icon value to the content (::before) where it is used.<br>(And also sets its font size)</p>
                        <pre><code class="language-scss">// Loop through each service to assign styles
@each $service, $color in $service-colors {
        &.#{$service} {
                i {
                        // mixin to set the icon and font size
                        @include icon($service, 2em);
                }
                > i::before {
                    text-align: center;
                    line-height: 2em;
                    display: block;
                    border-radius: 50%;
                    width: 65px;
                    height: 65px;
                    background: $color;
                    color: white;
                }
                &:hover {
                        background-color: $color;
                        color: $color-white;
                        i::before {
                                color: $color;
                                background-color: $color-white;
                        }
                }
        }
}</code></pre>
                        <p>A loop that iterates through all of the different key-pairs in the service-colors map.</p>
                        <p>Styling each icon and assigning each one its unique icon and color using the mixin from before and the $color variable from the @each loop.</p>
                        <p>This styles 7 different icons with the same section of code rather than having to repeat it.</p>
                    </div>

                    <div>
                        <p class="bold">JavaScript Array Reflection:<br>Notifications and Validation</p>
                        <p>JavaScript</p>
                        <div class="example3 bold">
                            <p>Example</p>
                            <form>
                                <input type="email" placeholder="Email"/><input class="btn-test" type="submit" value="Test"/>
                            </form>
                            <div>

                            </div>
                        </div>
                        <pre><code class="language-javascript">// show a popup message briefly at the bottom of the screen
let messageBusy = false;
function showMessage(message) {
    if (!messageBusy) {
            messageBusy = true;
            $("#message").html(message);
            $("#message").slideDown(500).delay(2000).slideUp(500, function() {
                    messageBusy = false;
            });
    }
}</code></pre>
                        <p>A function to display an animated pop notification at the bottom of the screen.</p>
                        <p>Uses the messageBusy variable to ignore any further message attempts until it has finished animating.</p>
                        <pre><code class="language-javascript">// return true when email validates OK
function validateEmail(email) {
    // Empty email
    if (!email) {
            showMessage("An Email Is Required");
            return false;
    // Invalid characters in email
    } else if (!email.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?@^_`{|}~]*$/)) {
            showMessage("Invalid Characters In Email");
            return false;
    // At most 254 Characters
    } else if (email.length > 254) {
            showMessage("Email Is Too Long");
            return false;
    // Far from perfect, catches the general format of emails
    } else if (!email.match(/^[a-zA-Z0-9-!#$%&'*+.\/=?^_`{|}~]+@[a-zA-Z0-9-.]+\.[a-zA-Z]{2,}$/)) {
            showMessage("Invalid Email");
    // No problems
    } else {
        showMessage("Example Validated OK"); // Added for this example
        return true;
    }
}</code></pre>
                        <p>A function to check the validity of the given email address, returns true only when it is valid.</p>
                        <p>A series of conditions are checked in order and the first one to fail triggers the message function from before.</p>
                        <p>The code calling this function would then execute other things based on the true or false response.</p>
                    </div>

                    <div class="example4">
                        <p class="bold">Database Challenge:<br>Querying a Movie Database</p>
                        <p>SQL</p>
                        <img src="img/sqltables.jpg" alt="Image of the tables in the example movies database">
                        <p>A visual representation of the tables and their relationships in our example Movies Database.</p>
                        <p>Of interest is the 1 movie to many rating(s) relationship.</p>
                        <pre><code class="sql">SELECT movie.mov_title AS "Title", movie.mov_year AS "Year", rating."Average Rating"
FROM movie

INNER JOIN (
    SELECT ROUND(AVG(rev_stars),1) AS "Average Rating", mov_id
    FROM rating
    GROUP BY mov_id
    HAVING AVG(rev_stars) >= 8
) AS rating ON movie.mov_id = rating.mov_id

ORDER BY rating."Average Rating" DESC</code></pre>
                        <p>Firstly the query selects the columns to display in the final results table, and aliases them to heading names.</p>
                        <p>Initially it selects from the movie table, and then performs an inner join onto a ratings sub query, meaning that any movies not returned by this sub query will not show up in the final results.</p>
                        <p>This sub query groups all the ratings by their movie ID, and then generates an average rating for each movie, using this value to both filter the results to only movies with an average rating of over 8, and to round it to 1 decimal place as the selected "Average Rating" value.</p>
                        <p>Finally the results are ordered by the average rating in descending order.</p>
                        <table class="example4"><tbody>
                            <tr><th>Title</th><th>Year</th><th>Average Rating</th></tr>
                            <tr><td>The Usual Suspects </td><td>1995</td><td>8.6</td></tr>
                            <tr><td>Princess Mononoke </td><td>1997</td><td>8.4</td></tr>
                            <tr><td>Aliens </td><td>1986</td><td>8.4</td></tr>
                            <tr><td>Vertigo </td><td>1958</td><td>8.4</td></tr>
                            <tr><td>Lawrence of Arabia </td><td>1962</td><td>8.3</td></tr>
                            <tr><td>Blade Runner </td><td>1982</td><td>8.2</td></tr>
                            <tr><td>Donnie Darko </td><td>2001</td><td>8.1</td></tr>
                            <tr><td>Annie Hall </td><td>1977</td><td>8.1</td></tr>
                            <tr><td>Slumdog Millionaire </td><td>2008</td><td>8.0</td></tr>
                        </tbody></table>
                        <p>The final table showing Title, Year and Average Rating, with only ratings above 8, sorted by rating.</p>
                    </div>




                    <div>
                        <p class="bold">Laravel Reflection:<br>Search Function</p>
                        <p>PHP</p>
                        <pre><code class="php">public function search()
{
    $search = Request::get('q');
    if ($search == "") {
        return redirect('/employee');
    }</code></pre>
                        <p>First we pull the search string from the request, but if it is empty; aborts by redirecting back to the full employee listing.</p>
                        <pre><code class="php">    $searchValues = preg_split('/\s+/', $search, -1, PREG_SPLIT_NO_EMPTY);
    $results = Employee::where(function ($q) use ($searchValues) {
        foreach ($searchValues as $value) {
            $q->orWhere('first', 'like', '%' . $value . '%')
                ->orWhere('last', 'like', '%' . $value . '%');
        }
    })->latest('updated_at')->paginate(10)->setPath('');</code></pre>
                        <p>Next the search string is broken down into an array of individual values using the preg_split function.</p>
                        <p>We then loop through all of these values matching each one against either the first or last names.</p>
                        <p>These results are then ordered by their last update and broken into pages of 10.</p>
                        <img src="img/clockwork.jpg" alt="Image of a SQL query generated by Laravel">
                        <p>An image from the clockwork plugin; showing the SQL query that a search for "One Two Three" generates.</p>
                        <pre><code class="php">    $results->appends(array(
        'q' => Request::get('q')
    ));

    return view('employee.index', [
        'employees' => $results
    ])->withMessage('Search Employees: \'' . $search . '\'');
}</code></pre>
                        <p>Then the search query string is appended to the results so that it is included in pagination links.</p>
                        <p>Lastly return the the employee.index view using the results of this search, and a message to make it clear that the user is looking at these search results and not the full employee index.</p>

                    </div>

                </div>
            </section>
<?php
    include("inc/contact.php");
	include("inc/footer.php");
?>
        <script src="js/highlight/highlight.min.js"></script>
        <script>hljs.highlightAll();</script>
<?php
	include("inc/footer2.php");
?>