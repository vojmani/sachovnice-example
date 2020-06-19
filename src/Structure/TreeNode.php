<?php
declare(strict_types=1);


namespace Sachovnice\Structure;


use Sachovnice\Entity\Policko;

class TreeNode
{
    private ?TreeNode $parent;

    /**
     * @var TreeNode[]
     */
    private array $children;

    private Policko $value;

    public function __construct(Policko $value, ?TreeNode $parent = null)
    {
        $this->value = $value;
        $this->parent = $parent;
    }

    public function addChild(TreeNode $treeNode): void
    {
        array_push($this->children, $treeNode);
    }

    public function getStackToRoot(): array
    {
        if($this->parent === null){
            return [$this->getValue()];
        }

        return array_merge([$this->getValue()], $this->parent->getStackToRoot());
    }

    /**
     * @return Policko
     */
    public function getValue(): Policko
    {
        return $this->value;
    }

    /**
     * @param Policko $value
     * @return TreeNode
     */
    public function setValue(Policko $value): TreeNode
    {
        $this->value = $value;
        return $this;
    }
}