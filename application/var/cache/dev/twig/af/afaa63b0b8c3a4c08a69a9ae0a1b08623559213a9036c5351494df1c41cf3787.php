<?php

/* @Framework/Form/datetime_widget.html.php */
class __TwigTemplate_529cecb98cb73cea65e4d7da03b5f6de45469b239527810de8c60355af521859 extends Twig_Template
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
        $__internal_ddbb1e7ac95d17b4cb178f8e41c22944f3306826c7f94edd17c04e8f4ba77dce = $this->env->getExtension("native_profiler");
        $__internal_ddbb1e7ac95d17b4cb178f8e41c22944f3306826c7f94edd17c04e8f4ba77dce->enter($__internal_ddbb1e7ac95d17b4cb178f8e41c22944f3306826c7f94edd17c04e8f4ba77dce_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/datetime_widget.html.php"));

        // line 1
        echo "<?php if (\$widget == 'single_text'): ?>
    <?php echo \$view['form']->block(\$form, 'form_widget_simple'); ?>
<?php else: ?>
    <div <?php echo \$view['form']->block(\$form, 'widget_container_attributes') ?>>
        <?php echo \$view['form']->widget(\$form['date']).' '.\$view['form']->widget(\$form['time']) ?>
    </div>
<?php endif ?>
";
        
        $__internal_ddbb1e7ac95d17b4cb178f8e41c22944f3306826c7f94edd17c04e8f4ba77dce->leave($__internal_ddbb1e7ac95d17b4cb178f8e41c22944f3306826c7f94edd17c04e8f4ba77dce_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/datetime_widget.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if ($widget == 'single_text'): ?>*/
/*     <?php echo $view['form']->block($form, 'form_widget_simple'); ?>*/
/* <?php else: ?>*/
/*     <div <?php echo $view['form']->block($form, 'widget_container_attributes') ?>>*/
/*         <?php echo $view['form']->widget($form['date']).' '.$view['form']->widget($form['time']) ?>*/
/*     </div>*/
/* <?php endif ?>*/
/* */
