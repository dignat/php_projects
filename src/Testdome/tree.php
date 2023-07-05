<?php
class CategoryTree
{
    private $categories = [];

    public function addCategory(string $category, string $parent = null): void
    {
        $this->categories[$category] = $parent;
    }

    public function getChildren(string $parent): array
    {
        $children = [];

        foreach ($this->categories as $category => $categoryParent) {
            if ($categoryParent === $parent) {
                $children[] = $category;
            }
        }

        return $children;
    }
}

$c = new CategoryTree();
$c->addCategory('A', null);
$c->addCategory('B', 'A');
$c->addCategory('C', 'A');
echo implode(',', $c->getChildren('A'));