<?php
class PluginSidebarBootstrapious_2{
  function __construct(){
    wfPlugin::includeonce('wf/array');
    wfPlugin::includeonce('wf/yml');
  }
  public function widget_include($data){
    $data = new PluginWfArray($data);
    $element = new PluginWfYml(__DIR__.'/element/'.__FUNCTION__.'.yml');
    wfDocument::renderElement($element);
    if($data->get('data/style')){
      $element = wfDocument::createHtmlElement('style', $data->get('data/style'));
      wfDocument::renderElement(array($element));
    }
  }
  public function widget_sidebar($data){
    $data = new PluginWfArray($data);
    $element = new PluginWfYml(__DIR__.'/element/'.__FUNCTION__.'.yml');
    /*
     *
     */
    $element->setByTag($data->get('data/wrapper'), 'wrapper');
    /*
     * method
     */
    if($data->get('data/method')){
      $plugin = $data->get('data/method/plugin');
      wfPlugin::includeonce($plugin);
      $obj = wfSettings::getPluginObj($plugin);
      $obj_method = $data->get('data/method/method');
      $data->set('data', $obj->$obj_method($data->get('data')));
    }
    /*
     * item
     */
    if($data->get('data/item')){
      $item = array();
      foreach($data->get('data/item') as $v){
        if(!is_array($v)){
          $temp = new PluginWfYml(wfGlobals::getAppDir().$v);
          $item[] = $temp->get();
        }else{
          $item[] = $v;
        }
      }
      $element->setByTag(array('item' => $item));
    }
    /*
     * content
     */
    if($data->get('data/content')){
      if(!is_array($data->get('data/content'))){
        $temp = new PluginWfYml(wfGlobals::getAppDir().$data->get('data/content'));
        $element->setByTag(array('content' => $temp->get()));
      }else{
        $item[] = $v;
        $element->setByTag(array('content' => $data->get('data/content')));
      }
    }
    /**
     * Clear (if rs:item or rs:content not used)
     */
    $element->setByTag(array(), 'rs', true);
    /*
     *
     */
    wfDocument::renderElement($element);
  }
  public function method_example($data){
    /**
     * This is an example of how one could build a method.
     */
    $data = new PluginWfArray($data);
    $temp = new PluginWfYml(wfGlobals::getAppDir().'/plugin/sidebar/bootstrapious_2/element/sidebar_header.yml');
    $data->set('item/', $temp->get());
    $temp = new PluginWfYml(wfGlobals::getAppDir().'/plugin/sidebar/bootstrapious_2/element/sidebar_list_unstyled_components.yml');
    $data->set('item/', $temp->get());
    $temp = new PluginWfYml(wfGlobals::getAppDir().'/plugin/sidebar/bootstrapious_2/element/sidebar_list_unstyled_ctas.yml');
    $data->set('item/', $temp->get());
    $temp = new PluginWfYml(wfGlobals::getAppDir().'/plugin/sidebar/bootstrapious_2/element/sidebar_content.yml');
    $data->set('content', $temp->get());
    return $data->get();
  }
}
