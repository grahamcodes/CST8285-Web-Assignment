<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Currency Converter</title>
    <link rel="stylesheet" href="style.css"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
</head>
<body>
    <div class="navbar">

        <a href="index.php" class="navitem"><i class="bi bi-house-fill"></i> Home</a>

        <div class="dropdown navitem">
            <a href="#"><i class="bi bi-easel-fill"></i> Products</a>
                <div class="dropdown-content">
                    <a href="currency.php"><i class="bi bi-cash-stack"></i> Currency Exchange</a>
                    <a href="#"><i class="bi bi-easel"></i> Service 2        </a>
                </div>
        </div>

        <div class="dropdown navitem">
            <a href="contact.html"><i class="bi bi-envelope-fill"></i> Contact Us</a>
                <div class="dropdown-content">
                    <a href="#"><img src="https://flagcdn.com/16x12/fr.png" alt="Français"> Contactez-Nous</a>
                    <a href="#"><img src="https://flagcdn.com/16x12/de.png" alt="Deutsch"> Kontakt</a>
                </div>
        </div>

        <a href="aboutme.html" class="navitem"><i class="bi bi-person-circle"></i> About Me</a>
    </div>

    <header id="top">
        <h1>Currency Converter</h1>
        <p>Calculate currency conversions here. Enter the amount you with to convert. Select the type of
            currency you wish to convert, and the currency you wish to convert to.</p>
    </header>

    <div class="conversionForm">
        <form id="toConvert" method="get">
            <!-- Currency amount input. -->
            <div class="formFields">
                <fieldset>
                    <label for="amountInput">Amount to Convert</label>
                    <input type="text" id="amount" name="amount" required="required">
                </fieldset>
            </div>
            <div id="convertFrom">
                <fieldset>

                    <legend>Convert From</legend>

                    <!-- Radio buttons for selecting currency to exchange from. -->
                    <div class="selectFrom">
                        <label for="cadFrom"><input id="cadFrom" type="radio" name="conFrom" value="CAD" required="required"><span><img src="https://flagcdn.com/16x12/ca.png" alt="ca ">CAD<br></span></label>
                        <label for="usdFrom"><input id="usdFrom" type="radio" name="conFrom" value="USD"><span><img src="https://flagcdn.com/16x12/us.png" alt="us ">USD<br></span></label>
                        <label for="eurFrom"><input id="eurFrom" type="radio" name="conFrom" value="EUR"><span><img src="https://flagcdn.com/16x12/eu.png" alt="eu ">EUR<br></span></label>
                        <label for="gbpFrom"><input id="gpbFrom" type="radio" name="conFrom" value="GBP"><span><img src="https://flagcdn.com/16x12/gb.png" alt="gb ">GBP<br></span></label>
                        <label for="cnyFrom"><input id="cnyFrom" type="radio" name="conFrom" value="CNY"><span><img src="https://flagcdn.com/16x12/cn.png" alt="cn ">CNY</span></label>
                    </div>
                </fieldset>
            </div>
            <div id="convertTo">
                <fieldset>

                    <legend>Convert To</legend>

                    <!-- Radio buttons for selecting currency to exchange to. -->
                    <div class="selectTo">
                        <label for="cadTo"><input id="cadTo" type="radio" name="conTo" value="CAD" required="required"><span><img src="https://flagcdn.com/16x12/ca.png" alt="ca ">CAD<br></span></label>
                        <label for="usdTo"><input id="usdTo" type="radio" name="conTo" value="USD"><span><img src="https://flagcdn.com/16x12/us.png" alt="us ">USD<br></span></label>
                        <label for="eurTo"><input id="eurTo" type="radio" name="conTo" value="EUR"><span><img src="https://flagcdn.com/16x12/eu.png" alt="eu ">EUR<br></span></label>
                        <label for="gbpTo"><input id="gbpTo" type="radio" name="conTo" value="GBP"><span><img src="https://flagcdn.com/16x12/gb.png" alt="gb ">GBP<br></span></label>
                        <label for="cnyTo"><input id="cnyTo" type="radio" name="conTo" value="CNY"><span><img src="https://flagcdn.com/16x12/cn.png" alt="cn ">CNY</span></label>
                    </div>
                </fieldset>
            </div>
            <!-- Submission button. -->
            <div class="formFields">
                <fieldset id="submitConversion">
                    <input id="convertButton" type="submit" name="submit" value="convert">
                </fieldset>
            </div>
        </form>
    </div>

    <?php
        if (isset($_POST["submit"])) {

            function convertCurrency($amount, $conFrom, $conTo) {

                $signFrom;
                $signTo;
                $firstConversion;
                $finalConversion;

                // Exchange rates from X to CAD (as of 14/03/2021 3:30am).
                $usdToCad = 0.80161;
                $eurToCad = 0.67061;
                $gbpToCad = 0.57580;
                $cnyToCad = 5.2172;

                // Exchange rates from CAD to X (as of 14/03/2021 3:30am).
                $cadToUsd = 1.2475;
                $cadToEur = 1.4912;
                $cadToGbp = 1.7367;
                $cadToCny = 0.19167;


                // Invalidate non-numericals.
                if (!is_numeric($amount)) {
                    $signFrom = '';
                    $signTo = '';
                    $amount = '';
                    $finalConversion = "ERROR: Invalid entry.";
                // No need to convert a currency into itself. Must still set symbol.
                } else if ($conFrom == $conTo) {
                    $finalConversion = round($amount, 2);
                    if ($conTo == 'CAD') {
                        $signTo = '<img src="https://flagcdn.com/16x12/ca.png" alt="ca "> (CAD) $';
                        $signFrom = '<img src="https://flagcdn.com/16x12/ca.png" alt="ca "> (CAD) $';
                    } else if ($conTo == 'USD') {
                        $signTo = '<img src="https://flagcdn.com/16x12/us.png" alt="us "> (USD) $';
                        $signFrom = '<img src="https://flagcdn.com/16x12/us.png" alt="us "> (USD) $';
                    } else if ($conTo == 'EUR') {
                        $signTo = '<img src="https://flagcdn.com/16x12/eu.png" alt="eu "> (EUR) €';
                        $signFrom = '<img src="https://flagcdn.com/16x12/eu.png" alt="eu "> (EUR) €';
                    } else if ($conTo == 'GBP') {
                        $signTo = '<img src="https://flagcdn.com/16x12/gb.png" alt="gb "> (GBP) £';
                        $signFrom = '<img src="https://flagcdn.com/16x12/gb.png" alt="gb "> (GBP) £';
                    } else if ($conTo == 'CNY') {
                        $signTo = '<img src="https://flagcdn.com/16x12/cn.png" alt="cn "> (CNY) ¥';
                        $signFrom = '<img src="https://flagcdn.com/16x12/cn.png" alt="cn "> (CNY) ¥';
                    }
                // First convert amount to CAD.
                } else {

                    if ($conFrom == 'CAD') {
                        $signFrom = '<img src="https://flagcdn.com/16x12/ca.png" alt="ca "> (CAD) $';
                        $firstConversion = $amount;
                    } else if ($conFrom == 'USD') {
                        $signFrom = '<img src="https://flagcdn.com/16x12/us.png" alt="us "> (USD) $';
                        $firstConversion = $amount / $usdToCad;
                    } else if ($conFrom == 'EUR') {
                        $signFrom = '<img src="https://flagcdn.com/16x12/eu.png" alt="eu "> (EUR) €';
                        $firstConversion = $amount / $eurToCad;
                    } else if ($conFrom == 'GBP') {
                        $signFrom = '<img src="https://flagcdn.com/16x12/gb.png" alt="gb "> (GBP) £';
                        $firstConversion = $amount / $gbpToCad;
                    } else if ($conFrom == 'CNY') {
                        $signFrom = '<img src="https://flagcdn.com/16x12/cn.png" alt="cn "> (CNY) ¥';
                        $firstConversion = $amount / $cnyToCad;
                    }

                    // Now convert CAD amount to desired currency.
                    if ($conTo == 'CAD') {
                        $signTo = '<img src="https://flagcdn.com/16x12/ca.png" alt="ca "> (CAD) $';
                        $finalConversion = round($firstConversion, 2);
                    } else if ($conTo == 'USD') {
                        $signTo = '<img src="https://flagcdn.com/16x12/us.png" alt="us "> (USD) $';
                        $finalConversion = round($firstConversion / $cadToUsd, 2);
                    } else if ($conTo == 'EUR') {
                        $signTo = '<img src="https://flagcdn.com/16x12/eu.png" alt="eu "> (EUR) €';
                        $finalConversion = round($firstConversion / $cadToEur, 2);
                    } else if ($conTo == 'GBP') {
                        $signTo = '<img src="https://flagcdn.com/16x12/gb.png" alt="gb "> (GBP) £';
                        $finalConversion = round($firstConversion / $cadToGbp, 2);
                    } else if ($conTo == 'CNY') {
                        $signTo = '<img src="https://flagcdn.com/16x12/cn.png" alt="cn "> (CNY) ¥';
                        $finalConversion = round($firstConversion / $cadToCny, 2);
                    }
                }
                    // Print result.
                    echo '<p style=text-align:center;font-size:x-large;>' . $signFrom . $amount . ' <i class="bi bi-arrow-right-circle"></i> ' . $signTo . $finalConversion . '</p>';
            }
            convertCurrency($_POST['amount'], $_POST['conFrom'], $_POST['conTo']);
        }
    ?>
</body>
</html>
