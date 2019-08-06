<?php

/* @Framework/FormTable/form_widget_compound.html.php */
class __TwigTemplate_d775dff9f0a9558c7974ff619b88c5541514b862ff0e234c5fc66fc0d2ea0611 extends Twig_Template
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
        $__internal_afb842a199b476154f0884db45e6b2f69e57d35afd935580f7ff3d9bde472857 = $this->env->getExtension("native_profiler");
        $__internal_afb842a199b476154f0884db45e6b2f69e57d35afd935580f7ff3d9bde472857->enter($__internal_afb842a199b476154f0884db45e6b2f69e57d35afd935580f7ff3d9bde472857_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/FormTable/form_widget_compound.html.php"));

        // line 1
        echo "<table <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
    <?php if (!\$form->parent && \$errors): ?>
    <tr>
        <td colspan=\"2\">
            <?php echo \$view['form']->errors(\$form) ?>
        </td>
    </tr>
    <?php endif ?>
    <?php echo \$view['form']->block(\$form, 'form_rows') ?>
    <?php echo \$view['form']->rest(\$form) ?>
</table>
";
        
        $__internal_afb842a199b476154f0884db45e6b2f69e57d35afd935580f7ff3d9bde472857->leave($__internal_afb842a199b476154f0884db45e6b2f69e57d35afd935580f7ff3d9bde472857_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/FormTable/form_widget_compound.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <table <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*     <?php if (!$form->parent && $errors): ?>*/
/*     <tr>*/
/*         <td colspan="2">*/
/*             <?php echo $view['form']->errors($form) ?>*/
/*         </td>*/
/*     </tr>*/
/*     <?php endif ?>*/
/*     <?php echo $view['form']->block($form, 'form_rows') ?>*/
/*     <?php echo $view['form']->rest($form) ?>*/
/* </table>*/
/* */
