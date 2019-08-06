<?php

/* WebProfilerBundle:Profiler:ajax_layout.html.twig */
class __TwigTemplate_520d4af9fe2b351542c2a3001ba60dad07725ee92892e9b06bf35dacb5fcf249 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'panel' => array($this, 'block_panel'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_82b77f79da22f87008049aef1356e8a39de5cf51ada6673eaa44215c14942fb5 = $this->env->getExtension("native_profiler");
        $__internal_82b77f79da22f87008049aef1356e8a39de5cf51ada6673eaa44215c14942fb5->enter($__internal_82b77f79da22f87008049aef1356e8a39de5cf51ada6673eaa44215c14942fb5_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "WebProfilerBundle:Profiler:ajax_layout.html.twig"));

        // line 1
        $this->displayBlock('panel', $context, $blocks);
        
        $__internal_82b77f79da22f87008049aef1356e8a39de5cf51ada6673eaa44215c14942fb5->leave($__internal_82b77f79da22f87008049aef1356e8a39de5cf51ada6673eaa44215c14942fb5_prof);

    }

    public function block_panel($context, array $blocks = array())
    {
        $__internal_7fa67237335688cf850be9ce35d24e91f007540b978a7de18e981834f268a35f = $this->env->getExtension("native_profiler");
        $__internal_7fa67237335688cf850be9ce35d24e91f007540b978a7de18e981834f268a35f->enter($__internal_7fa67237335688cf850be9ce35d24e91f007540b978a7de18e981834f268a35f_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "panel"));

        echo "";
        
        $__internal_7fa67237335688cf850be9ce35d24e91f007540b978a7de18e981834f268a35f->leave($__internal_7fa67237335688cf850be9ce35d24e91f007540b978a7de18e981834f268a35f_prof);

    }

    public function getTemplateName()
    {
        return "WebProfilerBundle:Profiler:ajax_layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  23 => 1,);
    }
}
/* {% block panel '' %}*/
/* */
