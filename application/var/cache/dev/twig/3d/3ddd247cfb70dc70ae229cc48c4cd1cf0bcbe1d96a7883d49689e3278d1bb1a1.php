<?php

/* @Framework/FormTable/hidden_row.html.php */
class __TwigTemplate_64cf737b0a6859565fa0d9a6517432a529c0f96f5ce21701e1adfba63484dec6 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_676c1eddf49698a0e973d0efb7ba5b88f89ebfe855a851b5d474fd3031038a30 = $this->env->getExtension("native_profiler");
        $__internal_676c1eddf49698a0e973d0efb7ba5b88f89ebfe855a851b5d474fd3031038a30->enter($__internal_676c1eddf49698a0e973d0efb7ba5b88f89ebfe855a851b5d474fd3031038a30_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/hidden_row.html.php"));

        // line 1
        echo "<tr style=\"display: none\">
    <td colspan=\"2\">
        <?php echo \$view['form']->widget(\$form) ?>
    </td>
</tr>
";
        
        $__internal_676c1eddf49698a0e973d0efb7ba5b88f89ebfe855a851b5d474fd3031038a30->leave($__internal_676c1eddf49698a0e973d0efb7ba5b88f89ebfe855a851b5d474fd3031038a30_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/hidden_row.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <tr style="display: none">*/
/*     <td colspan="2">*/
/*         <?php echo $view['form']->widget($form) ?>*/
/*     </td>*/
/* </tr>*/
/* */
