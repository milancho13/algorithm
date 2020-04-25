<?php


require_once 'TreeNode.php';


class BinaryTree
{
    public static function createNewNode($value)
    {
        $node = new TreeNode();
        $node->value = $value;
        $node->leftNode = null;
        $node->rightNode = null;
        return $node;
    }

    public static function insertNode($value, $node)
    {
        if ($node->value == $value) {
            return false;
        }

        if ($node->value > $value) {
            if ($node->leftNode != null) {
                self::insertNode($value, $node->leftNode);
            } else {
                $node->leftNode = self::createNewNode($value);
                return true;
            }
        } else {
            if ($node->rigthNode != null) {
                self::insertNode($value, $node->rightNode);
            } else {
                $node->rightNode = self::createNewNode($value);
                return true;
            }
        }
    }

    public static function find($value, $node)
    {
        if ($node->value == $value) {
            return true;
        }

        if ($node->value > $value) {
            if (empty($node->leftNode)) {
                return false;
            }

            return self::find($value, $node->leftNode);
        } else {
            if (empty($node->rightNode)) {
                return false;
            }
            return self::find($value, $node->rightNode);
        }
    }

    public static function delete($value, &$tree)
    {
        $rootNode = &$tree;
        $node =  &$tree;
        $parent = null;
        $direction = 0;

        while ($node !== null && $node->value != $value) {
            if ($node->value > $value) {
                $parent = &$node;
                $node = &$node->leftNode;
                $direction = -1;
            } else {
                $parent = &$node;
                $node = &$node->rightNode;
                $direction = 1;
            }
        }

        if ($node == null) {
            return false;
        }

        if ($node->leftNode == null && $node->rightNode == null) {
            if ($direction == -1) {
                $parent->leftNode = null;
            } else {
                $parent->rightNode = null;
            }
        } else if ($node->leftNode == null && $node->rightNode != null) {
            if ($direction == -1) {
                $parent->leftNode = $node->rightNode;
            } else if ($direction == 1) {
                $parent->rightNode = $node->rightNode;
            } else if ($direction == 0) {
                $rootNode = $node->rightNode;
            }
        } else if ($node->leftNode != null && $node->rightNode == null) {
            if ($direction == -1) {
                $parent->leftNode = $node->leftNode;
            } else if ($direction == 1) {
                $parent->rightNode = $node->leftNode;
            } else if ($direction == 0) {
                $rootNode = $node->leftNode;
            }
        } else {
            $leftBiggest = &$node->leftNode;
            $parent = &$node;
            $direction = -1;

            while ($leftBiggest->rightNode != null) {
                $parent = &$leftBiggest;
                $leftBiggest = &$leftBiggest->rightNode;
                $direction = 1;
            }

            $node->value = $leftBiggest->value;
            if ($direction == -1) {
                $parent->leftNode = &$leftBiggest->leftNode;
            } else {
                $parent->rightNode = &$leftBiggest->leftNode;
            }
        }
        return true;
    }
}
