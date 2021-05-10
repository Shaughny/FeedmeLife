<?php
$xml = <<<XML
<?xml version="1.0"?>
<root>
  <parent>
     <child>bar</child>
     <child>foo</child>
  </parent>
  <parent>
     <child>bar2</child>
     <child>foo2</child>
  </parent>
</root>
XML;
?>

<?php
// Create a new document fragment to hold the new <parent> node
$parent = new DomDocument;
$parent_node = $parent ->createElement('parent');

// Add some children
$parent_node->appendChild($parent->createElement('child', 'somevalue'));
$parent_node->appendChild($parent->createElement('child', 'anothervalue'));

// Add the keywordset into the new document
// The $parent variable now holds the new node as a document fragment
$parent->appendChild($parent_node);
?>
<?php
// Load the XML
$dom = new DomDocument;
$dom->loadXML($xml);

// Locate the old parent node
$xpath = new DOMXpath($dom);
$nodelist = $xpath->query('/root/parent');
$oldnode = $nodelist->item(0);
?>


<?php
// Load the $parent document fragment into the current document
$newnode = $dom->importNode($parent->documentElement, true);

// Replace
$oldnode->parentNode->replaceChild($newnode, $oldnode);

// Display
echo $dom->saveXML();
?>