<!DOCTYPE html>

<html>
    <head>
        <title>Tour Page</title>
        <link rel="stylesheet" href="Stylesheet.css" type="text/css">
        <link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css" />
        <script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
    </head>
    
    <body>
        <div class="container">
            <div class="header-cont">
                <div class="header">
                    <ul id="MenuBar2" class="MenuBarHorizontal">
                        <li><a href="Index.html">Home</a></li>
                        <li><a href="Order.php">Order</a></li>
                        <li><a href="Tour.php">Tours</a></li>
                        <li><a href="Account.php">Account</a></li>
                    </ul>
                    <h1><span id="headertext">TecVault Bunkers</span></h1>
                </div>
            </div>
            <div class="content">
                <h2>Can't Decide? Need some help?</h2>
                <p>Come take a tour at any of our facilities.</p>
                <br>
                <hr class="fade">
                <br>
                <form>
                    <div id="formCol1">
                        <h3>Sign Up!</h3>
                        <p>First Name: <input type="text"></p>
                        <p>Last Name: <input type="text"></p>
                        <p>Email: <input type="text"></p>
                        <p>Phone Number: <input type="text"></p>
                    </div>
                    <div id="formCol2">
                        <br>
                        <p>Date: <input type="date"><br>
                            <i><span id="smallText"> Bunkers are available for touring 24/7.</span></i>
                        </p>
                        <p>Location:
                            <select>
                                <optgroup label="Western USA">
                                    <option value="california">California SafeZone</option>
                                    <option value="washington">Washington SafeZone</option>
                                </optgroup>
                                <optgroup label="Central USA">
                                    <option value="kansas">Kansas SafeZone</option>
                                    <option value="texas">Texas SafeZone</option>
                                </optgroup>
                                <optgroup label="Eastern USA">
                                    <option value="newyork">New York SafeZone</option>
                                    <option value="florida">Flordia SafeZone</option>
                                </optgroup>
                            </select>
                        </p>
                        <p>SafeZone ID:
                            <select>
                                <option value="titanium">Titanium</option>
                                <option value="cobolt">Cobalt</option>
                                <option value="stronghold">Stronghold</option>
                                <option value="tower">Tower</option>
                            </select>
                        </p>
                    </div>
                </form>
                <br>
                <hr class="fade">
                <br>
            </div>
        </div>   
    </body>
</html>