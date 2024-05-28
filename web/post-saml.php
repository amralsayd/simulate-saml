<?php

include "inc.php";
include "src/Utility/IdpProvider.php";
include "src/Utility/IdpTools.php";

// Initiating our IdP Provider dummy connection.
$idpProvider = new IdpProvider();

// Instantiating our Utility class.
$idpTools = new IdpTools();

// Receive the HTTP Request and extract the SAMLRequest.
$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
$saml_request = $idpTools->readSAMLRequest($request);

// Getting a few details from the message like ID and Issuer.
$issuer = $saml_request->getMessage()->getIssuer()->getValue();
$id = $saml_request->getMessage()->getID();

// Simulate user information from IdP
$user_id = $request->get("username");
$user_email = $idpProvider->getUserEmail();


$attributes['id_type'] = $request->get('id_type');
$attributes['arabicNationality'] = $request->get('arabicNationality');
$attributes['arabicFirstName'] = $request->get('arabicFirstName');
$attributes['arabicFatherName'] = $request->get('arabicFatherName');
$attributes['arabicGrandFatherName'] = $request->get('arabicGrandFatherName');
$attributes['arabicFamilyName'] = $request->get('arabicFamilyName');
$attributes['englishFirstName'] = $request->get('englishFirstName');
$attributes['englishFatherName'] = $request->get('englishFatherName');
$attributes['englishGrandFatherName'] = $request->get('englishGrandFatherName');
$attributes['englishFamilyName'] = $request->get('englishFamilyName');
$attributes['dob'] = $request->get('dob');
$attributes['dobHijri'] = $request->get('dobHijri');
$attributes['idExpiryDateHijri'] = $request->get('idExpiryDateHijri');
$attributes['cardIssueDateHijri'] = $request->get('cardIssueDateHijri');
$attributes['idExpiryDateGregorian'] = $request->get('idExpiryDateGregorian');
$attributes['cardIssueDateGregorian'] = $request->get('cardIssueDateGregorian');
$attributes['iqamaExpiryDateHijri'] = $request->get('iqamaExpiryDateHijri');
$attributes['iqamaExpiryDateGregorian'] = $request->get('iqamaExpiryDateGregorian');
$attributes['issueLocationAr'] = $request->get('issueLocationAr');
$attributes['idVersionNo'] = $request->get('idVersionNo');
$attributes['nationality'] = $request->get('nationality');
$attributes['nationalityCode'] = $request->get('nationalityCode');
$attributes['gender'] = $request->get('gender');
$attributes['lang'] = $request->get('lang');
$attributes['preferredLang'] = $request->get('preferredLang');



// Construct a SAML Response.
// $idNumber = rand(1000000000,2999999999);
$idNumber = $user_id;//rand(8000000000,9999999999);
$response = $idpTools->createSAMLResponse($idpProvider, $idNumber, 'gen-'.$idNumber.'@gmail.com', $issuer, $id, $attributes);

// Prepare the POST binding (form).
$bindingFactory = new \LightSaml\Binding\BindingFactory();
$postBinding = $bindingFactory->create(\LightSaml\SamlConstants::BINDING_SAML2_HTTP_POST);
$messageContext = new \LightSaml\Context\Profile\MessageContext();
$messageContext->setMessage($response);

// Ensure we include the RelayState.
$message = $messageContext->getMessage();
$message->setRelayState($request->get('RelayState'));
$messageContext->setMessage($message);

// Return the Response.
/** @var \Symfony\Component\HttpFoundation\Response $httpResponse */
// print "<pre>".print_r($messageContext,true)."</pre>";exit();
$httpResponse = $postBinding->send($messageContext);
// print "<pre>".print_r($httpResponse,true)."</pre>";exit();
// print "<pre>".print_r($httpResponse,true)."</pre>";exit();
// print "<pre>".print_r($httpResponse,true)."</pre>";exit();
// print "<pre>".print_r($httpResponse,true)."</pre>";exit();
// print "<pre>".print_r($httpResponse,true)."</pre>";exit();
print $httpResponse->getContent();
