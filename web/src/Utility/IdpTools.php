<?php

class IdpTools{

  /**
   * Reads a SAMLRequest from the HTTP request and returns a messageContext.
   *
   * @param \Symfony\Component\HttpFoundation\Request $request
   *   The HTTP request.
   *
   * @return \LightSaml\Context\Profile\MessageContext
   *   The MessageContext that contains the SAML message.
   *
   * check delete commit but key changes
   * check delete commit but key changes2
   * check delete commit but key changes 3
   */
  public function readSAMLRequest($request){

    // We use the Binding Factory to construct a new SAML Binding based on the
    // request.
    $bindingFactory = new \LightSaml\Binding\BindingFactory();
    $binding = $bindingFactory->getBindingByRequest($request);

    // We prepare a message context to receive our SAML Request message.
    $messageContext = new \LightSaml\Context\Profile\MessageContext();

    // The receive method fills in the messageContext with the SAML Request data.
    /** @var \LightSaml\Model\Protocol\Response $response */
    $binding->receive($request, $messageContext);

    return $messageContext;
  }

  /**
   * Constructs a SAML Response.
   *
   * @param \IdpProvider $idpProvider
   * @param $user_id
   * @param $user_email
   * @param $issuer
   * @param $id
   */
  public function createSAMLResponse($idpProvider, $user_id, $user_email, $issuer, $id, $attributes){


    $acsUrl = $idpProvider->getServiceProviderAcs($issuer);

    // Preparing the response XML
      $serializationContext = new \LightSaml\Model\Context\SerializationContext();

      // We now start constructing the SAML Response using LightSAML.
      $response = new \LightSaml\Model\Protocol\Response();
      $response
          ->addAssertion($assertion = new \LightSaml\Model\Assertion\Assertion())
          ->setStatus(new \LightSaml\Model\Protocol\Status(
              new \LightSaml\Model\Protocol\StatusCode(
                \LightSaml\SamlConstants::STATUS_SUCCESS)
              )
          )
          ->setID($user_id)
          ->setIssueInstant(new \DateTime())
          ->setDestination($acsUrl)
          // We obtain the Entity ID from the Idp.
          ->setIssuer(new \LightSaml\Model\Assertion\Issuer($idpProvider->getIdPId()))
      ;

      $assertion
          ->setId($user_id)
          ->setIssueInstant(new \DateTime())
          // We obtain the Entity ID from the Idp.
          ->setIssuer(new \LightSaml\Model\Assertion\Issuer($idpProvider->getIdPId()))
          ->setSubject(
              (new \LightSaml\Model\Assertion\Subject())
                  // Here we set the NameID that identifies the name of the user.
                  ->setNameID(new \LightSaml\Model\Assertion\NameID(
                    $user_id,
                      \LightSaml\SamlConstants::NAME_ID_FORMAT_UNSPECIFIED
                  ))
                  ->addSubjectConfirmation(
                      (new \LightSaml\Model\Assertion\SubjectConfirmation())
                          ->setMethod(\LightSaml\SamlConstants::CONFIRMATION_METHOD_BEARER)
                          ->setSubjectConfirmationData(
                              (new \LightSaml\Model\Assertion\SubjectConfirmationData())
                                  // We set the ResponseTo to be the id of the SAMLRequest.
                                  ->setInResponseTo($id)
                                  ->setNotOnOrAfter(new \DateTime('+1 MINUTE'))
                                  // The recipient is set to the Service Provider ACS.
                                  ->setRecipient($acsUrl)
                          )
                  )
          )
          ->setConditions(
              (new \LightSaml\Model\Assertion\Conditions())
                  ->setNotBefore(new \DateTime())
                  ->setNotOnOrAfter(new \DateTime('+1 MINUTE'))
                  ->addItem(
                      // Use the Service Provider Entity ID as AudienceRestriction.
                      new \LightSaml\Model\Assertion\AudienceRestriction([$issuer])
                  )
          )
          ->addItem(
              (new \LightSaml\Model\Assertion\AttributeStatement())
                  ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                      \LightSaml\ClaimTypes::EMAIL_ADDRESS,
                    // Setting the user email address.
                    $user_email
                  ))
          )
          ->addItem(
            (new \LightSaml\Model\Assertion\AttributeStatement())
                ->addAttribute(new \LightSaml\Model\Assertion\Attribute(
                  'http://iam.gov.sa/claims/userid',
                  $user_id
                ))
          )

          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/id_type', $attributes['id_type'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/arabicNationality',$attributes['arabicNationality'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/arabicFirstName',$attributes['arabicFirstName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/arabicFatherName',$attributes['arabicFatherName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/arabicGrandFatherName',$attributes['arabicGrandFatherName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/arabicFamilyName',$attributes['arabicFamilyName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/englishFirstName',$attributes['englishFirstName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/englishFatherName',$attributes['englishFatherName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/englishGrandFatherName',$attributes['englishGrandFatherName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/englishFamilyName',$attributes['englishFamilyName'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/dob',$attributes['dob'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/dobHijri',$attributes['dobHijri'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/idExpiryDateHijri',$attributes['idExpiryDateHijri'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/cardIssueDateHijri',$attributes['cardIssueDateHijri'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/idExpiryDateGregorian',$attributes['idExpiryDateGregorian'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/cardIssueDateGregorian',$attributes['cardIssueDateGregorian'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/iqamaExpiryDateHijri',$attributes['iqamaExpiryDateHijri'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/iqamaExpiryDateGregorian',$attributes['iqamaExpiryDateGregorian'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/issueLocationAr',$attributes['issueLocationAr'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/idVersionNo',$attributes['idVersionNo'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/nationality',$attributes['nationality'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/nationalityCode',$attributes['nationalityCode'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/gender',$attributes['gender'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/lang',$attributes['lang'])))
          ->addItem((new \LightSaml\Model\Assertion\AttributeStatement())->addAttribute(new \LightSaml\Model\Assertion\Attribute('http://iam.gov.sa/claims/preferredLang',$attributes['preferredLang'])))
          
          ->addItem(              (new \LightSaml\Model\Assertion\AuthnStatement())
                  ->setAuthnInstant(new \DateTime('-10 MINUTE'))
                  ->setSessionIndex($assertion->getId())
                  ->setAuthnContext(
                      (new \LightSaml\Model\Assertion\AuthnContext())
                          ->setAuthnContextClassRef(\LightSaml\SamlConstants::AUTHN_CONTEXT_PASSWORD_PROTECTED_TRANSPORT)
                  )
          )
      ;

    // Sign the response.
    $response->setSignature(new \LightSaml\Model\XmlDSig\SignatureWriter($idpProvider->getCertificate(), $idpProvider->getPrivateKey()));

    // Serialize to XML.
    $response->serialize($serializationContext->getDocument(), $serializationContext);

    // Set the postback url obtained from the trusted SPs as the destination.
    $response->setDestination($acsUrl);

    // print "<pre>".var_dump($response,true)."</pre>";exit();
      return $response;
  }
}
