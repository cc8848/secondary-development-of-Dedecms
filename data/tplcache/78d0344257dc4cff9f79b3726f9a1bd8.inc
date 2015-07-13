

[field:id/]==[field:typename/]  

[field:typename function='md5(@me)'/]   

[field:typename runphp='yes']
@me = (@me!="")?"空的":@me;
[/field:typename]  

[field:typename function='test_func(@me)'/]   

[dede:global.cfg_soft_lang/]

<br/>