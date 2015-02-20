<?php

namespace OB\EntitiesInspectBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class InspectorController extends Controller
{

    public function homeAction()
    {
        $em = $this->getDoctrine()->getManager();
        $metadata = $em->getMetadataFactory()->getAllMetadata();
        
        return $this->render(
            'EntitiesInspectBundle:Inspector:home.html.twig',
            [
                'metadata' => $metadata
            ]
        );
    }

    public function detailAction($entityName)
    {
        $em = $this->getDoctrine()->getManager();
        $metadata = $em->getMetadataFactory()->getMetadataFor($entityName);

        foreach ($metadata->getFieldNames() as $fieldName) {
            $fieldMapping = $metadata->getFieldMapping($fieldName);
            
            $type = isset($fieldMapping['length']) ? $fieldMapping['type'] . ' (' . $fieldMapping['length'] . ')' : $fieldMapping['type'];

            $default = isset($fieldMapping['options']['default']) ? $fieldMapping['options']['default'] : 'Nessuno';

            /**
             * @todo Fix with a better boolean casting
             */
            $default = !$default ? 0 : $default;

            $properties[] = [$fieldName, $type, $fieldMapping['nullable'], $default];
        }

        $associations = [];
        if (0 !== count($metadata->getAssociationMappings())) {
            foreach ($metadata->getAssociationMappings() as $association) {
                $associationType = $association['isOwningSide'] ? 'padre' : 'figlia';
                
                $associations[] = [$association['fieldName'], $association['targetEntity'],$associationType];
            }
        }
        
        return $this->render(
            'EntitiesInspectBundle:Inspector:detail.html.twig',
            [
                'metadata' => $metadata,
                'properties' => $properties,
                'associations' => $associations,
            ]
        );
    }
}
