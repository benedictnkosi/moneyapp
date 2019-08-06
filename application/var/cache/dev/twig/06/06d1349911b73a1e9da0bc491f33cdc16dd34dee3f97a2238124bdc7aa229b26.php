<?php

/* @Framework/Form/form_errors.html.php */
class __TwigTemplate_7580c19685dbda270809c7e557da68db82a6e175fc8889bed3792448bd44065e extends Twig_Template
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
        $__internal_220368c5ac8934f3e48a9821b10682b8dd2414f811a2237d3ecf97c17ad5a05c = $this->env->getExtension("native_profiler");
        $__internal_220368c5ac8934f3e48a9821b10682b8dd2414f811a2237d3ecf97c17ad5a05c->enter($__internal_220368c5ac8934f3e48a9821b10682b8dd2414f811a2237d3ecf97c17ad5a05c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "@Framework/Form/form_errors.html.php"));

        // line 1
        echo "<?php if (count(\$errors) > 0): ?>
    <ul>
        <?php foreach (\$errors as \$error): ?>
            <li><?php echo \$error->getMessage() ?></li>
        <?php endforeach; ?>
    </ul>
<?php endif ?>
";
        
        $__internal_220368c5ac8934f3e48a9821b10682b8dd2414f811a2237d3ecf97c17ad5a05c->leave($__internal_220368c5ac8934f3e48a9821b10682b8dd2414f811a2237d3ecf97c17ad5a05c_prof);

    }

    public function getTemplateName()
    {
        return "@Framework/Form/form_errors.html.php";
    }

    public function getDebugInfo()
    {
        return array (  22 => 1,);
    }
}
/* <?php if (count($errors) > 0): ?>*/
/*     <ul>*/
/*         <?php foreach ($errors as $error): ?>*/
/*             <li><?php echo $error->getMessage() ?></li>*/
/*         <?php endforeach; ?>*/
/*     </ul>*/
/* <?php endif ?>*/
/* */
