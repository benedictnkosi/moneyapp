<?php

/**
 * Enter description here ...
 * @author sibusiso87rn
 *
 */
class PartnerServicePriceDTO {

   private $partnerProfileId;
   private $partnerServiceId;
   private $partnerServicePriceId;
   private $serviceName;
   private $serviceAmount;
   private $partnerServiceDateAdded;
   private $partnerServicePriceDateAdded;
   private $partnerServicePriceStatus;
   private $partnerServiceStatus;

   public function getPartnerProfileId(){
      return $this->partnerProfileId;
   }

   public function setPartnerProfileId($partnerProfileId){
      $this->partnerProfileId = $partnerProfileId;
   }

   public function getPartnerServiceId(){
      return $this->partnerServiceId;
   }

   public function setPartnerServiceId($partnerServiceId){
      $this->partnerServiceId = $partnerServiceId;
   }

   public function getPartnerServicePriceId(){
      return $this->partnerServicePriceId;
   }

   public function setPartnerServicePriceId($partnerServicePriceId){
      $this->partnerServicePriceId = $partnerServicePriceId;
   }

   public function getServiceName(){
      return $this->serviceName;
   }

   public function setServiceName($serviceName){
      $this->serviceName = $serviceName;
   }

   public function getServiceAmount(){
      return $this->serviceAmount;
   }

   public function setServiceAmount($serviceAmount){
      $this->serviceAmount = $serviceAmount;
   }

   public function getPartnerServiceDateAdded(){
      return $this->partnerServiceDateAdded;
   }

   public function setPartnerServiceDateAdded($partnerServiceDateAdded){
      $this->partnerServiceDateAdded = $partnerServiceDateAdded;
   }

   public function getPartnerServicePriceDateAdded(){
      return $this->partnerServicePriceDateAdded;
   }

   public function setPartnerServicePriceDateAdded($partnerServicePriceDateAdded){
      $this->partnerServicePriceDateAdded = $partnerServicePriceDateAdded;
   }

   public function getPartnerServicePriceStatus(){
      return $this->partnerServicePriceStatus;
   }

   public function setPartnerServicePriceStatus($partnerServicePriceStatus){
      $this->partnerServicePriceStatus = $partnerServicePriceStatus;
   }

   public function getPartnerServiceStatus(){
      return $this->partnerServiceStatus;
   }

   public function setPartnerServiceStatus($partnerServiceStatus){
      $this->partnerServiceStatus = $partnerServiceStatus;
   }


}