<?php

namespace Symfony\Components\DomCrawler\Field;

/*
 * This file is part of the symfony package.
 *
 * (c) Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * InputFormField represents an input form field (an HTML input tag).
 *
 * For inputs with type of file, checkbox, or radio, there are other more
 * specialized classes (cf. FileFormField and ChoiceFormField).
 *
 * @package    Symfony
 * @subpackage Components_DomCrawler
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 */
class InputFormField extends FormField
{
  /**
   * Initializes the form field.
   */
  protected function initialize()
  {
    if ('input' != $this->node->nodeName)
    {
      throw new \LogicException(sprintf('An InputFormField can only be created from an input tag (%s given).', $this->node->nodeName));
    }

    if ('checkbox' == $this->node->getAttribute('type'))
    {
      throw new \LogicException('Checkboxes should be instances of ChoiceFormField.');
    }

    if ('file' == $this->node->getAttribute('type'))
    {
      throw new \LogicException('File inputs should be instances of FileFormField.');
    }

    $this->value = $this->node->getAttribute('value');
  }
}