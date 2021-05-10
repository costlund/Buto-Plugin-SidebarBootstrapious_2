# Buto-Plugin-SidebarBootstrapious_2
From part "2. Fixed positioned scrollable sidebar".
```
https://bootstrapious.com/p/bootstrap-sidebar
https://bootstrapious.com/tutorial/sidebar/index2.html
```

## Widget include
Include css and js.
```
type: widget
data:
  plugin: sidebar/bootstrapious_2
  method: include
```
Override style from file /plugin/sidebar/bootstrapious_2/css/style2.css.
```
  data:
    style: "#sidebar{background:silver}"
```


## Widget sidebar
```
type: widget
data:
  plugin: sidebar/bootstrapious_2
  method: sidebar
  data:
```
Simple example with data from this plugin. 
Replace with your custom files.
```
    item:
      - /plugin/sidebar/bootstrapious_2/element/sidebar_header.yml
      - /plugin/sidebar/bootstrapious_2/element/sidebar_list_unstyled_components.yml
      - /plugin/sidebar/bootstrapious_2/element/sidebar_list_unstyled_ctas.yml
    content: /plugin/sidebar/bootstrapious_2/element/sidebar_content.yml
```
File path or data is working.
```
    item:
      -
        type: div
        attribute:
          class: sidebar-header
        innerHTML:
          -
            type: h3
            innerHTML: 'Sidebar demo'
      - /plugin/sidebar/bootstrapious_2/element/sidebar_list_unstyled_components.yml
      - /plugin/sidebar/bootstrapious_2/element/sidebar_list_unstyled_ctas.yml
    content:
      -
        type: button
        attribute:
          type: button
          id: sidebarCollapse
          class: 'btn btn-info'
        innerHTML:
          -
            type: widget
            data:
              plugin: 'icons/octicons'
              method: svg
              data:
                name: three-bars
```
One could also add dynamic data via a method. 
Check out method method_example() how to build one.
This is running before item and content are set.
```
    method:
      plugin: sidebar/bootstrapious_2
      method: method_example
```

## Files
This files are included.
```
/plugin/sidebar/bootstrapious_2/css/mCustomScrollbar.min.css
/plugin/sidebar/bootstrapious_2/js/mCustomScrollbar.concat.min.js
```
```
https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css
https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js
```
