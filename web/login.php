<?php

include "inc.php";

// Reading the HTTP Request
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();

?>

<h1>IdP Login Page ( Simulate Nafathz login)</h1>

<form action="post-saml.php">
    <div>
        <label>Username:</label>
        <input name="username" type="text">
    </div>
    <div>
        <label>Pass:</label>
        <input type="password" name="password">
    </div>

    <h2>Extra fields</h2>


    <div><label>id_type:</label><input name="id_type" type="text"></div>

    <div><label>arabicFirstName:</label><input name="arabicFirstName" type="text"></div>
    <div><label>arabicFatherName:</label><input name="arabicFatherName" type="text"></div>
    <div><label>arabicGrandFatherName:</label><input name="arabicGrandFatherName" type="text"></div>
    <div><label>arabicFamilyName:</label><input name="arabicFamilyName" type="text"></div>

    <div><label>englishFirstName:</label><input name="englishFirstName" type="text"></div>
    <div><label>englishFatherName:</label><input name="englishFatherName" type="text"></div>
    <div><label>englishGrandFatherName:</label><input name="englishGrandFatherName" type="text"></div>
    <div><label>englishFamilyName:</label><input name="englishFamilyName" type="text"></div>

    <div><label>dob:</label><input name="dob" type="text"></div>
    <div><label>dobHijri:</label><input name="dobHijri" type="text"></div>

    <div><label>cardIssueDateHijri:</label><input name="cardIssueDateHijri" type="text"></div>
    <div><label>cardIssueDateGregorian:</label><input name="cardIssueDateGregorian" type="text"></div>
    <div><label>idExpiryDateHijri:</label><input name="idExpiryDateHijri" type="text"></div>
    <div><label>idExpiryDateGregorian:</label><input name="idExpiryDateGregorian" type="text"></div>
    <div><label>iqamaExpiryDateHijri:</label><input name="iqamaExpiryDateHijri" type="text"></div>
    <div><label>iqamaExpiryDateGregorian:</label><input name="iqamaExpiryDateGregorian" type="text"></div>

    <div><label>issueLocationAr:</label><input name="issueLocationAr" type="text"></div>
    <div><label>idVersionNo:</label><input name="idVersionNo" type="text"></div>
    
    <div><label>nationality:</label><input name="nationality" type="text"></div>
    <div><label>nationalityCode:</label><input name="nationalityCode" type="text"></div>
    <div><label>arabicNationality:</label><input name="arabicNationality" type="text"></div>

    <div><label>gender:</label><input name="gender" type="text"></div>
    <div><label>lang:</label><input name="lang" type="text"></div>
    <div><label>preferredLang:</label><input name="preferredLang" type="text"></div>


    <input type="submit">
    <input type="hidden" name="SAMLRequest" value="<?php print $request->get("SAMLRequest") ?>">
    <input type="hidden" name="RelayState" value="<?php print $request->get("RelayState") ?>">
</form>
