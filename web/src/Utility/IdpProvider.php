<?php

class IdpProvider {

  // Defining some trusted Service Providers.
  private $trusted_sps = [
    'urn:service:provider:id' => 'https://service-provider.com/login/callback',
    'https://futurex.nelc.gov.sa/sp' => 'http://local.futurex.nelc.gov.sa/saml/acs',
    'http://local.authsaml.nelc.gov.sa/login.php' => 'http://local.futurex.nelc.gov.sa/saml/acs',
    // 'https://sso.elc.edu.sa/auth/realms/TEST-SSO' => 'https://sso.elc.edu.sa/auth/realms/TEST-SSO/protocol/saml'//'http://local.futurex.nelc.gov.sa/saml/acs',
    'https://sso.elc.edu.sa/auth/realms/TEST-SSO' => 'https://sso.elc.edu.sa/auth/realms/TEST-SSO/broker/saml-local-auth/endpoint'//'http://local.futurex.nelc.gov.sa/saml/acs',
    // 'https://sso.elc.edu.sa/auth/realms/TEST-SSO' => 'https://sso.elc.edu.sa/auth/realms/TEST-SSO/broker/saml-local-auth/endpoint'//'http://local.futurex.nelc.gov.sa/saml/acs',
    // 'https://sso.elc.edu.sa/auth/realms/TEST-SSO' => 'https://sso.elc.edu.sa/auth/realms/TEST-SSO/protocol/saml/acs'//'http://local.futurex.nelc.gov.sa/saml/acs',
  ];

  // urn:oasis:names:tc:SAML:1.1:nameid-format:unspecified
  // urn:oasis:names:tc:SAML:1.1:nameid-format:emailAddress
  // urn:oasis:names:tc:SAML:2.0:nameid-format:transient
  // urn:oasis:names:tc:SAML:2.0:nameid-format:persistent

  /**
   * Retrieves the Assertion Consumer Service.
   *
   * @param string
   *   The Service Provider Entity Id
   * @return
   *   The Assertion Consumer Service Url.
   */
  public function getServiceProviderAcs($entityId){
    // print_r($entityId);exit();
    return $this->trusted_sps[$entityId];
  }

  /**
   * Returning a dummy IdP identifier.
   *
   * @return string
   */
  public function getIdPId(){
    return "https://www.idp.com";
  }

  /**
   * Retrieves the certificate from the IdP.
   *
   * @return \LightSaml\Credential\X509Certificate
   */
  public function getCertificate(){
    return \LightSaml\Credential\X509Certificate::fromFile('cert/saml_test_certificate.crt');
  }

  /**
   * Retrieves the private key from the Idp.
   *
   * @return \RobRichards\XMLSecLibs\XMLSecurityKey
   */
  public function getPrivateKey(){
    return \LightSaml\Credential\KeyHelper::createPrivateKey('cert/saml_test_certificate.key', '', true);
  }

  /**
   * Returns a dummy user email.
   *
   * @return string
   */
  public function getUserEmail(){

    return "duarte.garin@samltuts.com";
  }

}
