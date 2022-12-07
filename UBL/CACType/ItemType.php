<?php

namespace i3or1s\UBL\CACType;

use i3or1s\UBL\CAC\AdditionalItemIdentification;
use i3or1s\UBL\CAC\AdditionalItemProperty;
use i3or1s\UBL\CAC\BuyersItemIdentification;
use i3or1s\UBL\CAC\CatalogueDocumentReference;
use i3or1s\UBL\CAC\CatalogueItemIdentification;
use i3or1s\UBL\CAC\Certificate;
use i3or1s\UBL\CAC\ClassifiedTaxCategory;
use i3or1s\UBL\CAC\CommodityClassification;
use i3or1s\UBL\CAC\Dimension;
use i3or1s\UBL\CAC\HazardousItem;
use i3or1s\UBL\CAC\InformationContentProviderParty;
use i3or1s\UBL\CAC\ItemInstance;
use i3or1s\UBL\CAC\ItemSpecificationDocumentReference;
use i3or1s\UBL\CAC\ManufacturerParty;
use i3or1s\UBL\CAC\ManufacturersItemIdentification;
use i3or1s\UBL\CAC\OriginAddress;
use i3or1s\UBL\CAC\OriginCountry;
use i3or1s\UBL\CAC\SellersItemIdentification;
use i3or1s\UBL\CAC\StandardItemIdentification;
use i3or1s\UBL\CAC\TransactionConditions;
use i3or1s\UBL\CBC\AdditionalInformation;
use i3or1s\UBL\CBC\BrandName;
use i3or1s\UBL\CBC\CatalogueIndicator;
use i3or1s\UBL\CBC\Description;
use i3or1s\UBL\CBC\HazardousRiskIndicator;
use i3or1s\UBL\CBC\Keyword;
use i3or1s\UBL\CBC\ModelName;
use i3or1s\UBL\CBC\Name;
use i3or1s\UBL\CBC\PackQuantity;
use i3or1s\UBL\CBC\PackSizeNumeric;

/**
 * http://www.datypic.com/sc/ubl21/t-cac_ItemType.html.
 */
abstract class ItemType implements \Stringable
{
    protected const ELEMENT_SIGNATURE = 'cac:ItemType';

    /** @var Description[]|null */
    public readonly ?array $Description; // [0..*]    Text describing this item.
    public readonly ?PackQuantity $PackQuantity; // [0..1]    The unit packaging quantity; the number of subunits making up this item.
    public readonly ?PackSizeNumeric $PackSizeNumeric; // [0..1]    The number of items in a pack of this item.
    public readonly ?CatalogueIndicator $CatalogueIndicator; // [0..1]    An indicator that this item was ordered from a catalogue (true) or not (false).
    public readonly ?Name $Name; // [0..1]    A short name optionally given to this item, such as a name from a catalogue, as distinct from a description.
    public readonly ?HazardousRiskIndicator $HazardousRiskIndicator; // [0..1]    An indication that the transported item, as delivered, is subject to an international regulation concerning the carriage of dangerous goods (true) or not (false).
    /** @var AdditionalInformation[]|null */
    public readonly ?array $AdditionalInformation; // [0..*]    Further details regarding this item (e.g., the URL of a relevant web page).
    /** @var Keyword[]|null */
    public readonly ?array $Keyword; // [0..*]    A keyword (search string) for this item, assigned by the seller party. Can also be a synonym for the name of the item.
    /** @var BrandName[]|null */
    public readonly ?array $BrandName; // [0..*]    A brand name of this item.
    /** @var ModelName[]|null */
    public readonly ?array $ModelName; // [0..*]    A model name of this item.
    public readonly ?BuyersItemIdentification $BuyersItemIdentification; // [0..1]    Identifying information for this item, assigned by the buyer.
    public readonly ?SellersItemIdentification $SellersItemIdentification; // [0..1]    Identifying information for this item, assigned by the seller.
    /** @var ManufacturersItemIdentification[]|null */
    public readonly ?array $ManufacturersItemIdentification; // [0..*]    Identifying information for this item, assigned by the manufacturer.
    public readonly ?StandardItemIdentification $StandardItemIdentification; // [0..1]    Identifying information for this item, assigned according to a standard system.
    public readonly ?CatalogueItemIdentification $CatalogueItemIdentification; // [0..1]    Identifying information for this item, assigned according to a cataloguing system.
    /** @var AdditionalItemIdentification[]|null */
    public readonly ?array $AdditionalItemIdentification; // [0..*]    An additional identifier for this item.
    public readonly ?CatalogueDocumentReference $CatalogueDocumentReference; // [0..1]    A reference to the catalogue in which this item appears.
    /** @var ItemSpecificationDocumentReference[]|null */
    public readonly ?array $ItemSpecificationDocumentReference; // [0..*]    A reference to a specification document for this item.
    public readonly ?OriginCountry $OriginCountry; // [0..1]    The country of origin of this item.
    /** @var CommodityClassification[]|null */
    public readonly ?array $CommodityClassification; // [0..*]    A classification of this item according to a specific system for classifying commodities.
    /** @var TransactionConditions[]|null */
    public readonly ?array $TransactionConditions; // [0..*]    A set of sales conditions applying to this item.
    /** @var HazardousItem[]|null */
    public readonly ?array $HazardousItem; // [0..*]    Information pertaining to this item as a hazardous item.
    /** @var ClassifiedTaxCategory[]|null */
    public readonly ?array $ClassifiedTaxCategory; // [0..*]    A tax category applicable to this item.
    /** @var AdditionalItemProperty[]|null */
    public readonly ?array $AdditionalItemProperty; // [0..*]    An additional property of this item.
    /** @var ManufacturerParty[]|null */
    public readonly ?array $ManufacturerParty; // [0..*]    The manufacturer of this item.
    public readonly ?InformationContentProviderParty $InformationContentProviderParty; // [0..1]    The party responsible for specification of this item.
    /** @var OriginAddress[]|null */
    public readonly ?array $OriginAddress; // [0..*]    A region (not country) of origin of this item.
    /** @var ItemInstance[]|null */
    public readonly ?array $ItemInstance; // [0..*]    A trackable, unique instantiation of this item.
    /** @var Certificate[]|null */
    public readonly ?array $Certificate; // [0..*]    A certificate associated with this item.
    /** @var Dimension[]|null */
    public readonly ?array $Dimension; // [0..*]    One of the measurable dimensions (length, mass, weight, or volume) of this item.

    /**
     * @param Description[]|null                        $Description
     * @param AdditionalInformation[]|null              $AdditionalInformation
     * @param Keyword[]|null                            $Keyword
     * @param BrandName[]|null                          $BrandName
     * @param ModelName[]|null                          $ModelName
     * @param ManufacturersItemIdentification[]|null    $ManufacturersItemIdentification
     * @param AdditionalItemIdentification[]|null       $AdditionalItemIdentification
     * @param ItemSpecificationDocumentReference[]|null $ItemSpecificationDocumentReference
     * @param CommodityClassification[]|null            $CommodityClassification
     * @param TransactionConditions[]|null              $TransactionConditions
     * @param HazardousItem[]|null                      $HazardousItem
     * @param ClassifiedTaxCategory[]|null              $ClassifiedTaxCategory
     * @param AdditionalItemProperty[]|null             $AdditionalItemProperty
     * @param ManufacturerParty[]|null                  $ManufacturerParty
     * @param OriginAddress[]|null                      $OriginAddress
     * @param ItemInstance[]|null                       $ItemInstance
     * @param Certificate[]|null                        $Certificate
     * @param Dimension[]|null                          $Dimension
     */
    public function __construct(?array $Description, ?PackQuantity $PackQuantity, ?PackSizeNumeric $PackSizeNumeric, ?CatalogueIndicator $CatalogueIndicator, ?Name $Name, ?HazardousRiskIndicator $HazardousRiskIndicator, ?array $AdditionalInformation, ?array $Keyword, ?array $BrandName, ?array $ModelName, ?BuyersItemIdentification $BuyersItemIdentification, ?SellersItemIdentification $SellersItemIdentification, ?array $ManufacturersItemIdentification, ?StandardItemIdentification $StandardItemIdentification, ?CatalogueItemIdentification $CatalogueItemIdentification, ?array $AdditionalItemIdentification, ?CatalogueDocumentReference $CatalogueDocumentReference, ?array $ItemSpecificationDocumentReference, ?OriginCountry $OriginCountry, ?array $CommodityClassification, ?array $TransactionConditions, ?array $HazardousItem, ?array $ClassifiedTaxCategory, ?array $AdditionalItemProperty, ?array $ManufacturerParty, ?InformationContentProviderParty $InformationContentProviderParty, ?array $OriginAddress, ?array $ItemInstance, ?array $Certificate, ?array $Dimension)
    {
        $this->Description = $Description;
        $this->PackQuantity = $PackQuantity;
        $this->PackSizeNumeric = $PackSizeNumeric;
        $this->CatalogueIndicator = $CatalogueIndicator;
        $this->Name = $Name;
        $this->HazardousRiskIndicator = $HazardousRiskIndicator;
        $this->AdditionalInformation = $AdditionalInformation;
        $this->Keyword = $Keyword;
        $this->BrandName = $BrandName;
        $this->ModelName = $ModelName;
        $this->BuyersItemIdentification = $BuyersItemIdentification;
        $this->SellersItemIdentification = $SellersItemIdentification;
        $this->ManufacturersItemIdentification = $ManufacturersItemIdentification;
        $this->StandardItemIdentification = $StandardItemIdentification;
        $this->CatalogueItemIdentification = $CatalogueItemIdentification;
        $this->AdditionalItemIdentification = $AdditionalItemIdentification;
        $this->CatalogueDocumentReference = $CatalogueDocumentReference;
        $this->ItemSpecificationDocumentReference = $ItemSpecificationDocumentReference;
        $this->OriginCountry = $OriginCountry;
        $this->CommodityClassification = $CommodityClassification;
        $this->TransactionConditions = $TransactionConditions;
        $this->HazardousItem = $HazardousItem;
        $this->ClassifiedTaxCategory = $ClassifiedTaxCategory;
        $this->AdditionalItemProperty = $AdditionalItemProperty;
        $this->ManufacturerParty = $ManufacturerParty;
        $this->InformationContentProviderParty = $InformationContentProviderParty;
        $this->OriginAddress = $OriginAddress;
        $this->ItemInstance = $ItemInstance;
        $this->Certificate = $Certificate;
        $this->Dimension = $Dimension;
    }

    public function __toString()
    {
        $response = [];
        if ($this->Description) {
            foreach ($this->Description as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->PackQuantity) {
            $response[] = (string) $this->PackQuantity;
        }
        if ($this->PackSizeNumeric) {
            $response[] = (string) $this->PackSizeNumeric;
        }
        if ($this->CatalogueIndicator) {
            $response[] = (string) $this->CatalogueIndicator;
        }
        if ($this->Name) {
            $response[] = (string) $this->Name;
        }
        if ($this->HazardousRiskIndicator) {
            $response[] = (string) $this->HazardousRiskIndicator;
        }
        if ($this->AdditionalInformation) {
            foreach ($this->AdditionalInformation as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Keyword) {
            foreach ($this->Keyword as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->BrandName) {
            foreach ($this->BrandName as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ModelName) {
            foreach ($this->ModelName as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->BuyersItemIdentification) {
            $response[] = (string) $this->BuyersItemIdentification;
        }
        if ($this->SellersItemIdentification) {
            $response[] = (string) $this->SellersItemIdentification;
        }
        if ($this->ManufacturersItemIdentification) {
            foreach ($this->ManufacturersItemIdentification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->StandardItemIdentification) {
            $response[] = (string) $this->StandardItemIdentification;
        }
        if ($this->CatalogueItemIdentification) {
            $response[] = (string) $this->CatalogueItemIdentification;
        }
        if ($this->AdditionalItemIdentification) {
            foreach ($this->AdditionalItemIdentification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->CatalogueDocumentReference) {
            $response[] = (string) $this->CatalogueDocumentReference;
        }
        if ($this->ItemSpecificationDocumentReference) {
            foreach ($this->ItemSpecificationDocumentReference as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->OriginCountry) {
            $response[] = (string) $this->OriginCountry;
        }
        if ($this->CommodityClassification) {
            foreach ($this->CommodityClassification as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->TransactionConditions) {
            foreach ($this->TransactionConditions as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->HazardousItem) {
            foreach ($this->HazardousItem as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ClassifiedTaxCategory) {
            foreach ($this->ClassifiedTaxCategory as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->AdditionalItemProperty) {
            foreach ($this->AdditionalItemProperty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ManufacturerParty) {
            foreach ($this->ManufacturerParty as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->InformationContentProviderParty) {
            $response[] = (string) $this->InformationContentProviderParty;
        }
        if ($this->OriginAddress) {
            foreach ($this->OriginAddress as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->ItemInstance) {
            foreach ($this->ItemInstance as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Certificate) {
            foreach ($this->Certificate as $elem) {
                $response[] = (string) $elem;
            }
        }
        if ($this->Dimension) {
            foreach ($this->Dimension as $elem) {
                $response[] = (string) $elem;
            }
        }

        return sprintf(
            '<%s>%s%s%s</%s>',
            $this::ELEMENT_SIGNATURE,
            PHP_EOL,
            implode(PHP_EOL, $response),
            PHP_EOL,
            $this::ELEMENT_SIGNATURE,
        );
    }
}
