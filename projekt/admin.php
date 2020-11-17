<?php
error_reporting(6135);$mc=!preg_match('~^(unsafe_raw)?$~',ini_get("filter.default"));if($mc||ini_get("filter.default_flags")){foreach(array('_GET','_POST','_COOKIE','_SERVER')as$X){$Cg=filter_input_array(constant("INPUT$X"),FILTER_UNSAFE_RAW);if($Cg)$$X=$Cg;}}if(function_exists("mb_internal_encoding"))mb_internal_encoding("8bit");function
connection(){global$h;return$h;}function
adminer(){global$b;return$b;}function
version(){global$ca;return$ca;}function
idf_unescape($u){$wd=substr($u,-1);return
str_replace($wd.$wd,$wd,substr($u,1,-1));}function
escape_string($X){return
substr(q($X),1,-1);}function
number($X){return

preg_replace('~[^0-9]+~','',$X);}function
number_type(){return'((?<!o)int(?!er)|numeric|real|float|double|decimal|money)';}function
remove_slashes($Me,$mc=false){if(get_magic_quotes_gpc()){while(list($y,$X)=each($Me)){foreach($X
as$nd=>$W){unset($Me[$y][$nd]);if(is_array($W)){$Me[$y][stripslashes($nd)]=$W;$Me[]=&$Me[$y][stripslashes($nd)];}else$Me[$y][stripslashes($nd)]=($mc?$W:stripslashes($W));}}}}function
bracket_escape($u,$Ga=false){static$og=array(':'=>':1',']'=>':2','['=>':3','"'=>':4');return
strtr($u,($Ga?array_flip($og):$og));}function
min_version($Og,$Hd="",$i=null){global$h;if(!$i)$i=$h;$wf=$i->server_info;if($Hd&&preg_match('~([\d.]+)-MariaDB~',$wf,$A)){$wf=$A[1];$Og=$Hd;}return(version_compare($wf,$Og)>=0);}function
charset($h){return(min_version("5.5.3",0,$h)?"utf8mb4":"utf8");}function
script($Ef,$ng="\n"){return"<script".nonce().">$Ef</script>$ng";}function
script_src($Hg){return"<script src='".h($Hg)."'".nonce()."></script>\n";}function
nonce(){return' nonce="'.get_nonce().'"';}function
target_blank(){return' target="_blank" rel="noreferrer noopener"';}function
h($Q){return
str_replace("\0","&#0;",htmlspecialchars($Q,ENT_QUOTES,'utf-8'));}function
nl_br($Q){return
str_replace("\n","<br>",$Q);}function
checkbox($B,$Y,$Va,$td="",$je="",$d="",$ud=""){$J="<input type='checkbox' name='$B' value='".h($Y)."'".($Va?" checked":"").($ud?" aria-labelledby='$ud'":"").">".($je?script("qsl('input').onclick = function () { $je };",""):"");return($td!=""||$d?"<label".($d?" class='$d'":"").">$J".h($td)."</label>":$J);}function
optionlist($C,$qf=null,$Kg=false){$J="";foreach($C
as$nd=>$W){$oe=array($nd=>$W);if(is_array($W)){$J.='<optgroup label="'.h($nd).'">';$oe=$W;}foreach($oe
as$y=>$X)$J.='<option'.($Kg||is_string($y)?' value="'.h($y).'"':'').(($Kg||is_string($y)?(string)$y:$X)===$qf?' selected':'').'>'.h($X);if(is_array($W))$J.='</optgroup>';}return$J;}function
html_select($B,$C,$Y="",$ie=true,$ud=""){if($ie)return"<select name='".h($B)."'".($ud?" aria-labelledby='$ud'":"").">".optionlist($C,$Y)."</select>".(is_string($ie)?script("qsl('select').onchange = function () { $ie };",""):"");$J="";foreach($C
as$y=>$X)$J.="<label><input type='radio' name='".h($B)."' value='".h($y)."'".($y==$Y?" checked":"").">".h($X)."</label>";return$J;}function
select_input($Ca,$C,$Y="",$ie="",$De=""){$Xf=($C?"select":"input");return"<$Xf$Ca".($C?"><option value=''>$De".optionlist($C,$Y,true)."</select>":" size='10' value='".h($Y)."' placeholder='$De'>").($ie?script("qsl('$Xf').onchange = $ie;",""):"");}function
confirm($Pd="",$rf="qsl('input')"){return
script("$rf.onclick = function () { return confirm('".($Pd?js_escape($Pd):'Czy jesteÅ› pewien?')."'); };","");}function
print_fieldset($t,$yd,$Rg=false){echo"<fieldset><legend>","<a href='#fieldset-$t'>$yd</a>",script("qsl('a').onclick = partial(toggle, 'fieldset-$t');",""),"</legend>","<div id='fieldset-$t'".($Rg?"":" class='hidden'").">\n";}function
bold($Oa,$d=""){return($Oa?" class='active $d'":($d?" class='$d'":""));}function
odd($J=' class="odd"'){static$s=0;if(!$J)$s=-1;return($s++%2?$J:'');}function
js_escape($Q){return
addcslashes($Q,"\r\n'\\/");}function
json_row($y,$X=null){static$nc=true;if($nc)echo"{";if($y!=""){echo($nc?"":",")."\n\t\"".addcslashes($y,"\r\n\t\"\\/").'": '.($X!==null?'"'.addcslashes($X,"\r\n\"\\/").'"':'null');$nc=false;}else{echo"\n}\n";$nc=true;}}function
ini_bool($ed){$X=ini_get($ed);return(preg_match('~^(on|true|yes)$~i',$X)||(int)$X);}function
sid(){static$J;if($J===null)$J=(SID&&!($_COOKIE&&ini_bool("session.use_cookies")));return$J;}function
set_password($Ng,$O,$V,$F){$_SESSION["pwds"][$Ng][$O][$V]=($_COOKIE["adminer_key"]&&is_string($F)?array(encrypt_string($F,$_COOKIE["adminer_key"])):$F);}function
get_password(){$J=get_session("pwds");if(is_array($J))$J=($_COOKIE["adminer_key"]?decrypt_string($J[0],$_COOKIE["adminer_key"]):false);return$J;}function
q($Q){global$h;return$h->quote($Q);}function
get_vals($G,$f=0){global$h;$J=array();$I=$h->query($G);if(is_object($I)){while($K=$I->fetch_row())$J[]=$K[$f];}return$J;}function
get_key_vals($G,$i=null,$zf=true){global$h;if(!is_object($i))$i=$h;$J=array();$I=$i->query($G);if(is_object($I)){while($K=$I->fetch_row()){if($zf)$J[$K[0]]=$K[1];else$J[]=$K[0];}}return$J;}function
get_rows($G,$i=null,$o="<p class='error'>"){global$h;$ib=(is_object($i)?$i:$h);$J=array();$I=$ib->query($G);if(is_object($I)){while($K=$I->fetch_assoc())$J[]=$K;}elseif(!$I&&!is_object($i)&&$o&&defined("PAGE_HEADER"))echo$o.error()."\n";return$J;}function
unique_array($K,$w){foreach($w
as$v){if(preg_match("~PRIMARY|UNIQUE~",$v["type"])){$J=array();foreach($v["columns"]as$y){if(!isset($K[$y]))continue
2;$J[$y]=$K[$y];}return$J;}}}function
escape_key($y){if(preg_match('(^([\w(]+)('.str_replace("_",".*",preg_quote(idf_escape("_"))).')([ \w)]+)$)',$y,$A))return$A[1].idf_escape(idf_unescape($A[2])).$A[3];return
idf_escape($y);}function
where($Z,$q=array()){global$h,$x;$J=array();foreach((array)$Z["where"]as$y=>$X){$y=bracket_escape($y,1);$f=escape_key($y);$J[]=$f.($x=="sql"&&preg_match('~^[0-9]*\.[0-9]*$~',$X)?" LIKE ".q(addcslashes($X,"%_\\")):($x=="mssql"?" LIKE ".q(preg_replace('~[_%[]~','[\0]',$X)):" = ".unconvert_field($q[$y],q($X))));if($x=="sql"&&preg_match('~char|text~',$q[$y]["type"])&&preg_match("~[^ -@]~",$X))$J[]="$f = ".q($X)." COLLATE ".charset($h)."_bin";}foreach((array)$Z["null"]as$y)$J[]=escape_key($y)." IS NULL";return
implode(" AND ",$J);}function
where_check($X,$q=array()){parse_str($X,$Ta);remove_slashes(array(&$Ta));return
where($Ta,$q);}function
where_link($s,$f,$Y,$le="="){return"&where%5B$s%5D%5Bcol%5D=".urlencode($f)."&where%5B$s%5D%5Bop%5D=".urlencode(($Y!==null?$le:"IS NULL"))."&where%5B$s%5D%5Bval%5D=".urlencode($Y);}function
convert_fields($g,$q,$M=array()){$J="";foreach($g
as$y=>$X){if($M&&!in_array(idf_escape($y),$M))continue;$za=convert_field($q[$y]);if($za)$J.=", $za AS ".idf_escape($y);}return$J;}function
cookie($B,$Y,$Ad=2592000){global$aa;return
header("Set-Cookie: $B=".urlencode($Y).($Ad?"; expires=".gmdate("D, d M Y H:i:s",time()+$Ad)." GMT":"")."; path=".preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]).($aa?"; secure":"")."; HttpOnly; SameSite=lax",false);}function
restart_session(){if(!ini_bool("session.use_cookies"))session_start();}function
stop_session($sc=false){if(!ini_bool("session.use_cookies")||($sc&&@ini_set("session.use_cookies",false)!==false))session_write_close();}function&get_session($y){return$_SESSION[$y][DRIVER][SERVER][$_GET["username"]];}function
set_session($y,$X){$_SESSION[$y][DRIVER][SERVER][$_GET["username"]]=$X;}function
auth_url($Ng,$O,$V,$m=null){global$Fb;preg_match('~([^?]*)\??(.*)~',remove_from_uri(implode("|",array_keys($Fb))."|username|".($m!==null?"db|":"").session_name()),$A);return"$A[1]?".(sid()?SID."&":"").($Ng!="server"||$O!=""?urlencode($Ng)."=".urlencode($O)."&":"")."username=".urlencode($V).($m!=""?"&db=".urlencode($m):"").($A[2]?"&$A[2]":"");}function
is_ajax(){return($_SERVER["HTTP_X_REQUESTED_WITH"]=="XMLHttpRequest");}function
redirect($Cd,$Pd=null){if($Pd!==null){restart_session();$_SESSION["messages"][preg_replace('~^[^?]*~','',($Cd!==null?$Cd:$_SERVER["REQUEST_URI"]))][]=$Pd;}if($Cd!==null){if($Cd=="")$Cd=".";header("Location: $Cd");exit;}}function
query_redirect($G,$Cd,$Pd,$We=true,$Yb=true,$fc=false,$dg=""){global$h,$o,$b;if($Yb){$Kf=microtime(true);$fc=!$h->query($G);$dg=format_time($Kf);}$Hf="";if($G)$Hf=$b->messageQuery($G,$dg,$fc);if($fc){$o=error().$Hf.script("messagesPrint();");return
false;}if($We)redirect($Cd,$Pd.$Hf);return
true;}function
queries($G){global$h;static$Qe=array();static$Kf;if(!$Kf)$Kf=microtime(true);if($G===null)return
array(implode("\n",$Qe),format_time($Kf));$Qe[]=(preg_match('~;$~',$G)?"DELIMITER ;;\n$G;\nDELIMITER ":$G).";";return$h->query($G);}function
apply_queries($G,$T,$Vb='table'){foreach($T
as$R){if(!queries("$G ".$Vb($R)))return
false;}return
true;}function
queries_redirect($Cd,$Pd,$We){list($Qe,$dg)=queries(null);return
query_redirect($Qe,$Cd,$Pd,$We,false,!$We,$dg);}function
format_time($Kf){return
sprintf('%.3f s',max(0,microtime(true)-$Kf));}function
remove_from_uri($we=""){return
substr(preg_replace("~(?<=[?&])($we".(SID?"":"|".session_name()).")=[^&]*&~",'',"$_SERVER[REQUEST_URI]&"),0,-1);}function
pagination($D,$sb){return" ".($D==$sb?$D+1:'<a href="'.h(remove_from_uri("page").($D?"&page=$D".($_GET["next"]?"&next=".urlencode($_GET["next"]):""):"")).'">'.($D+1)."</a>");}function
get_file($y,$wb=false){$kc=$_FILES[$y];if(!$kc)return
null;foreach($kc
as$y=>$X)$kc[$y]=(array)$X;$J='';foreach($kc["error"]as$y=>$o){if($o)return$o;$B=$kc["name"][$y];$kg=$kc["tmp_name"][$y];$lb=file_get_contents($wb&&preg_match('~\.gz$~',$B)?"compress.zlib://$kg":$kg);if($wb){$Kf=substr($lb,0,3);if(function_exists("iconv")&&preg_match("~^\xFE\xFF|^\xFF\xFE~",$Kf,$Xe))$lb=iconv("utf-16","utf-8",$lb);elseif($Kf=="\xEF\xBB\xBF")$lb=substr($lb,3);$J.=$lb."\n\n";}else$J.=$lb;}return$J;}function
upload_error($o){$Md=($o==UPLOAD_ERR_INI_SIZE?ini_get("upload_max_filesize"):0);return($o?'Wgranie pliku byÅ‚o niemoÅ¼liwe.'.($Md?" ".sprintf('Maksymalna wielkoÅ›Ä‡ pliku to %sB.',$Md):""):'Plik nie istnieje.');}function
repeat_pattern($Be,$zd){return
str_repeat("$Be{0,65535}",$zd/65535)."$Be{0,".($zd%65535)."}";}function
is_utf8($X){return(preg_match('~~u',$X)&&!preg_match('~[\0-\x8\xB\xC\xE-\x1F]~',$X));}function
shorten_utf8($Q,$zd=80,$Rf=""){if(!preg_match("(^(".repeat_pattern("[\t\r\n -\x{10FFFF}]",$zd).")($)?)u",$Q,$A))preg_match("(^(".repeat_pattern("[\t\r\n -~]",$zd).")($)?)",$Q,$A);return
h($A[1]).$Rf.(isset($A[2])?"":"<i>â€¦</i>");}function
format_number($X){return
strtr(number_format($X,0,".",' '),preg_split('~~u','0123456789',-1,PREG_SPLIT_NO_EMPTY));}function
friendly_url($X){return
preg_replace('~[^a-z0-9_]~i','-',$X);}function
hidden_fields($Me,$Vc=array()){$J=false;while(list($y,$X)=each($Me)){if(!in_array($y,$Vc)){if(is_array($X)){foreach($X
as$nd=>$W)$Me[$y."[$nd]"]=$W;}else{$J=true;echo'<input type="hidden" name="'.h($y).'" value="'.h($X).'">';}}}return$J;}function
hidden_fields_get(){echo(sid()?'<input type="hidden" name="'.session_name().'" value="'.h(session_id()).'">':''),(SERVER!==null?'<input type="hidden" name="'.DRIVER.'" value="'.h(SERVER).'">':""),'<input type="hidden" name="username" value="'.h($_GET["username"]).'">';}function
table_status1($R,$gc=false){$J=table_status($R,$gc);return($J?$J:array("Name"=>$R));}function
column_foreign_keys($R){global$b;$J=array();foreach($b->foreignKeys($R)as$wc){foreach($wc["source"]as$X)$J[$X][]=$wc;}return$J;}function
enum_input($U,$Ca,$p,$Y,$Qb=null){global$b;preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Jd);$J=($Qb!==null?"<label><input type='$U'$Ca value='$Qb'".((is_array($Y)?in_array($Qb,$Y):$Y===0)?" checked":"")."><i>".'puste'."</i></label>":"");foreach($Jd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Va=(is_int($Y)?$Y==$s+1:(is_array($Y)?in_array($s+1,$Y):$Y===$X));$J.=" <label><input type='$U'$Ca value='".($s+1)."'".($Va?' checked':'').'>'.h($b->editVal($X,$p)).'</label>';}return$J;}function
input($p,$Y,$Bc){global$yg,$b,$x;$B=h(bracket_escape($p["field"]));echo"<td class='function'>";if(is_array($Y)&&!$Bc){$xa=array($Y);if(version_compare(PHP_VERSION,5.4)>=0)$xa[]=JSON_PRETTY_PRINT;$Y=call_user_func_array('json_encode',$xa);$Bc="json";}$cf=($x=="mssql"&&$p["auto_increment"]);if($cf&&!$_POST["save"])$Bc=null;$Cc=(isset($_GET["select"])||$cf?array("orig"=>'bez zmian'):array())+$b->editFunctions($p);$Ca=" name='fields[$B]'";if($p["type"]=="enum")echo
h($Cc[""])."<td>".$b->editInput($_GET["edit"],$p,$Ca,$Y);else{$Jc=(in_array($Bc,$Cc)||isset($Cc[$Bc]));echo(count($Cc)>1?"<select name='function[$B]'>".optionlist($Cc,$Bc===null||$Jc?$Bc:"")."</select>".on_help("getTarget(event).value.replace(/^SQL\$/, '')",1).script("qsl('select').onchange = functionChange;",""):h(reset($Cc))).'<td>';$gd=$b->editInput($_GET["edit"],$p,$Ca,$Y);if($gd!="")echo$gd;elseif(preg_match('~bool~',$p["type"]))echo"<input type='hidden'$Ca value='0'>"."<input type='checkbox'".(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?" checked='checked'":"")."$Ca value='1'>";elseif($p["type"]=="set"){preg_match_all("~'((?:[^']|'')*)'~",$p["length"],$Jd);foreach($Jd[1]as$s=>$X){$X=stripcslashes(str_replace("''","'",$X));$Va=(is_int($Y)?($Y>>$s)&1:in_array($X,explode(",",$Y),true));echo" <label><input type='checkbox' name='fields[$B][$s]' value='".(1<<$s)."'".($Va?' checked':'').">".h($b->editVal($X,$p)).'</label>';}}elseif(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads"))echo"<input type='file' name='fields-$B'>";elseif(($ag=preg_match('~text|lob~',$p["type"]))||preg_match("~\n~",$Y)){if($ag&&$x!="sqlite")$Ca.=" cols='50' rows='12'";else{$L=min(12,substr_count($Y,"\n")+1);$Ca.=" cols='30' rows='$L'".($L==1?" style='height: 1.2em;'":"");}echo"<textarea$Ca>".h($Y).'</textarea>';}elseif($Bc=="json"||preg_match('~^jsonb?$~',$p["type"]))echo"<textarea$Ca cols='50' rows='12' class='jush-js'>".h($Y).'</textarea>';else{$Od=(!preg_match('~int~',$p["type"])&&preg_match('~^(\d+)(,(\d+))?$~',$p["length"],$A)?((preg_match("~binary~",$p["type"])?2:1)*$A[1]+($A[3]?1:0)+($A[2]&&!$p["unsigned"]?1:0)):($yg[$p["type"]]?$yg[$p["type"]]+($p["unsigned"]?0:1):0));if($x=='sql'&&min_version(5.6)&&preg_match('~time~',$p["type"]))$Od+=7;echo"<input".((!$Jc||$Bc==="")&&preg_match('~(?<!o)int(?!er)~',$p["type"])&&!preg_match('~\[\]~',$p["full_type"])?" type='number'":"")." value='".h($Y)."'".($Od?" data-maxlength='$Od'":"").(preg_match('~char|binary~',$p["type"])&&$Od>20?" size='40'":"")."$Ca>";}echo$b->editHint($_GET["edit"],$p,$Y);$nc=0;foreach($Cc
as$y=>$X){if($y===""||!$X)break;$nc++;}if($nc)echo
script("mixin(qsl('td'), {onchange: partial(skipOriginal, $nc), oninput: function () { this.onchange(); }});");}}function
process_input($p){global$b,$n;$u=bracket_escape($p["field"]);$Bc=$_POST["function"][$u];$Y=$_POST["fields"][$u];if($p["type"]=="enum"){if($Y==-1)return
false;if($Y=="")return"NULL";return+$Y;}if($p["auto_increment"]&&$Y=="")return
null;if($Bc=="orig")return(preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?idf_escape($p["field"]):false);if($Bc=="NULL")return"NULL";if($p["type"]=="set")return
array_sum((array)$Y);if($Bc=="json"){$Bc="";$Y=json_decode($Y,true);if(!is_array($Y))return
false;return$Y;}if(preg_match('~blob|bytea|raw|file~',$p["type"])&&ini_bool("file_uploads")){$kc=get_file("fields-$u");if(!is_string($kc))return
false;return$n->quoteBinary($kc);}return$b->processInput($p,$Y,$Bc);}function
fields_from_edit(){global$n;$J=array();foreach((array)$_POST["field_keys"]as$y=>$X){if($X!=""){$X=bracket_escape($X);$_POST["function"][$X]=$_POST["field_funs"][$y];$_POST["fields"][$X]=$_POST["field_vals"][$y];}}foreach((array)$_POST["fields"]as$y=>$X){$B=bracket_escape($y,1);$J[$B]=array("field"=>$B,"privileges"=>array("insert"=>1,"update"=>1),"null"=>1,"auto_increment"=>($y==$n->primary),);}return$J;}function
search_tables(){global$b,$h;$_GET["where"][0]["val"]=$_POST["query"];$tf="<ul>\n";foreach(table_status('',true)as$R=>$S){$B=$b->tableName($S);if(isset($S["Engine"])&&$B!=""&&(!$_POST["tables"]||in_array($R,$_POST["tables"]))){$I=$h->query("SELECT".limit("1 FROM ".table($R)," WHERE ".implode(" AND ",$b->selectSearchProcess(fields($R),array())),1));if(!$I||$I->fetch_row()){$Ke="<a href='".h(ME."select=".urlencode($R)."&where[0][op]=".urlencode($_GET["where"][0]["op"])."&where[0][val]=".urlencode($_GET["where"][0]["val"]))."'>$B</a>";echo"$tf<li>".($I?$Ke:"<p class='error'>$Ke: ".error())."\n";$tf="";}}}echo($tf?"<p class='message'>".'Brak tabel.':"</ul>")."\n";}function
dump_headers($Sc,$Ud=false){global$b;$J=$b->dumpHeaders($Sc,$Ud);$te=$_POST["output"];if($te!="text")header("Content-Disposition: attachment; filename=".$b->dumpFilename($Sc).".$J".($te!="file"&&!preg_match('~[^0-9a-z]~',$te)?".$te":""));session_write_close();ob_flush();flush();return$J;}function
dump_csv($K){foreach($K
as$y=>$X){if(preg_match("~[\"\n,;\t]~",$X)||$X==="")$K[$y]='"'.str_replace('"','""',$X).'"';}echo
implode(($_POST["format"]=="csv"?",":($_POST["format"]=="tsv"?"\t":";")),$K)."\r\n";}function
apply_sql_function($Bc,$f){return($Bc?($Bc=="unixepoch"?"DATETIME($f, '$Bc')":($Bc=="count distinct"?"COUNT(DISTINCT ":strtoupper("$Bc("))."$f)"):$f);}function
get_temp_dir(){$J=ini_get("upload_tmp_dir");if(!$J){if(function_exists('sys_get_temp_dir'))$J=sys_get_temp_dir();else{$r=@tempnam("","");if(!$r)return
false;$J=dirname($r);unlink($r);}}return$J;}function
file_open_lock($r){$_c=@fopen($r,"r+");if(!$_c){$_c=@fopen($r,"w");if(!$_c)return;chmod($r,0660);}flock($_c,LOCK_EX);return$_c;}function
file_write_unlock($_c,$tb){rewind($_c);fwrite($_c,$tb);ftruncate($_c,strlen($tb));flock($_c,LOCK_UN);fclose($_c);}function
password_file($ob){$r=get_temp_dir()."/adminer.key";$J=@file_get_contents($r);if($J||!$ob)return$J;$_c=@fopen($r,"w");if($_c){chmod($r,0660);$J=rand_string();fwrite($_c,$J);fclose($_c);}return$J;}function
rand_string(){return
md5(uniqid(mt_rand(),true));}function
select_value($X,$_,$p,$bg){global$b;if(is_array($X)){$J="";foreach($X
as$nd=>$W)$J.="<tr>".($X!=array_values($X)?"<th>".h($nd):"")."<td>".select_value($W,$_,$p,$bg);return"<table cellspacing='0'>$J</table>";}if(!$_)$_=$b->selectLink($X,$p);if($_===null){if(is_mail($X))$_="mailto:$X";if(is_url($X))$_=$X;}$J=$b->editVal($X,$p);if($J!==null){if(!is_utf8($J))$J="\0";elseif($bg!=""&&is_shortable($p))$J=shorten_utf8($J,max(0,+$bg));else$J=h($J);}return$b->selectVal($J,$_,$p,$X);}function
is_mail($Nb){$_a='[-a-z0-9!#$%&\'*+/=?^_`{|}~]';$Eb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';$Be="$_a+(\\.$_a+)*@($Eb?\\.)+$Eb";return
is_string($Nb)&&preg_match("(^$Be(,\\s*$Be)*\$)i",$Nb);}function
is_url($Q){$Eb='[a-z0-9]([-a-z0-9]{0,61}[a-z0-9])';return
preg_match("~^(https?)://($Eb?\\.)+$Eb(:\\d+)?(/.*)?(\\?.*)?(#.*)?\$~i",$Q);}function
is_shortable($p){return
preg_match('~char|text|json|lob|geometry|point|linestring|polygon|string|bytea~',$p["type"]);}function
count_rows($R,$Z,$ld,$Dc){global$x;$G=" FROM ".table($R).($Z?" WHERE ".implode(" AND ",$Z):"");return($ld&&($x=="sql"||count($Dc)==1)?"SELECT COUNT(DISTINCT ".implode(", ",$Dc).")$G":"SELECT COUNT(*)".($ld?" FROM (SELECT 1$G GROUP BY ".implode(", ",$Dc).") x":$G));}function
slow_query($G){global$b,$mg,$n;$m=$b->database();$eg=$b->queryTimeout();$Bf=$n->slowQuery($G,$eg);if(!$Bf&&support("kill")&&is_object($i=connect())&&($m==""||$i->select_db($m))){$sd=$i->result(connection_id());echo'<script',nonce(),'>
var timeout = setTimeout(function () {
	ajax(\'',js_escape(ME),'script=kill\', function () {
	}, \'kill=',$sd,'&token=',$mg,'\');
}, ',1000*$eg,');
</script>
';}else$i=null;ob_flush();flush();$J=@get_key_vals(($Bf?$Bf:$G),$i,false);if($i){echo
script("clearTimeout(timeout);");ob_flush();flush();}return$J;}function
get_token(){$Se=rand(1,1e6);return($Se^$_SESSION["token"]).":$Se";}function
verify_token(){list($mg,$Se)=explode(":",$_POST["token"]);return($Se^$_SESSION["token"])==$mg;}function
lzw_decompress($La){$Cb=256;$Ma=8;$ab=array();$ef=0;$ff=0;for($s=0;$s<strlen($La);$s++){$ef=($ef<<8)+ord($La[$s]);$ff+=8;if($ff>=$Ma){$ff-=$Ma;$ab[]=$ef>>$ff;$ef&=(1<<$ff)-1;$Cb++;if($Cb>>$Ma)$Ma++;}}$Bb=range("\0","\xFF");$J="";foreach($ab
as$s=>$Za){$Mb=$Bb[$Za];if(!isset($Mb))$Mb=$ah.$ah[0];$J.=$Mb;if($s)$Bb[]=$ah.$Mb[0];$ah=$Mb;}return$J;}function
on_help($fb,$_f=0){return
script("mixin(qsl('select, input'), {onmouseover: function (event) { helpMouseover.call(this, event, $fb, $_f) }, onmouseout: helpMouseout});","");}function
edit_form($a,$q,$K,$Fg){global$b,$x,$mg,$o;$Vf=$b->tableName(table_status1($a,true));page_header(($Fg?'Edytuj':'Dodaj'),$o,array("select"=>array($a,$Vf)),$Vf);if($K===false)echo"<p class='error'>".'Brak rekordÃ³w.'."\n";echo'<form action="" method="post" enctype="multipart/form-data" id="form">
';if(!$q)echo"<p class='error'>".'Brak uprawnieÅ„ do edycji tej tabeli'."\n";else{echo"<table cellspacing='0' class='layout'>".script("qsl('table').onkeydown = editingKeydown;");foreach($q
as$B=>$p){echo"<tr><th>".$b->fieldName($p);$xb=$_GET["set"][bracket_escape($B)];if($xb===null){$xb=$p["default"];if($p["type"]=="bit"&&preg_match("~^b'([01]*)'\$~",$xb,$Xe))$xb=$Xe[1];}$Y=($K!==null?($K[$B]!=""&&$x=="sql"&&preg_match("~enum|set~",$p["type"])?(is_array($K[$B])?array_sum($K[$B]):+$K[$B]):$K[$B]):(!$Fg&&$p["auto_increment"]?"":(isset($_GET["select"])?false:$xb)));if(!$_POST["save"]&&is_string($Y))$Y=$b->editVal($Y,$p);$Bc=($_POST["save"]?(string)$_POST["function"][$B]:($Fg&&preg_match('~^CURRENT_TIMESTAMP~i',$p["on_update"])?"now":($Y===false?null:($Y!==null?'':'NULL'))));if(preg_match("~time~",$p["type"])&&preg_match('~^CURRENT_TIMESTAMP~i',$Y)){$Y="";$Bc="now";}input($p,$Y,$Bc);echo"\n";}if(!support("table"))echo"<tr>"."<th><input name='field_keys[]'>".script("qsl('input').oninput = fieldChange;")."<td class='function'>".html_select("field_funs[]",$b->editFunctions(array("null"=>isset($_GET["select"]))))."<td><input name='field_vals[]'>"."\n";echo"</table>\n";}echo"<p>\n";if($q){echo"<input type='submit' value='".'Zapisz zmiany'."'>\n";if(!isset($_GET["select"])){echo"<input type='submit' name='insert' value='".($Fg?'Zapisz i kontynuuj edycjÄ™':'Zapisz i dodaj nastÄ™pny')."' title='Ctrl+Shift+Enter'>\n",($Fg?script("qsl('input').onclick = function () { return !ajaxForm(this.form, '".'Zapisywanie'."â€¦', this); };"):"");}}echo($Fg?"<input type='submit' name='delete' value='".'UsuÅ„'."'>".confirm()."\n":($_POST||!$q?"":script("focus(qsa('td', qs('#form'))[1].firstChild);")));if(isset($_GET["select"]))hidden_fields(array("check"=>(array)$_POST["check"],"clone"=>$_POST["clone"],"all"=>$_POST["all"]));echo'<input type="hidden" name="referer" value="',h(isset($_POST["referer"])?$_POST["referer"]:$_SERVER["HTTP_REFERER"]),'">
<input type="hidden" name="save" value="1">
<input type="hidden" name="token" value="',$mg,'">
</form>
';}if(isset($_GET["file"])){if($_SERVER["HTTP_IF_MODIFIED_SINCE"]){header("HTTP/1.1 304 Not Modified");exit;}header("Expires: ".gmdate("D, d M Y H:i:s",time()+365*24*60*60)." GMT");header("Last-Modified: ".gmdate("D, d M Y H:i:s")." GMT");header("Cache-Control: immutable");if($_GET["file"]=="favicon.ico"){header("Content-Type: image/x-icon");echo
lzw_decompress("\0\0\0` \0„\0\n @\0´C„è\"\0`EãQ¸àÿ‡?ÀtvM'”JdÁd\\Œb0\0Ä\"™ÀfÓˆ¤îs5›ÏçÑAXPaJ“0„¥‘8„#RŠT©‘z`ˆ#.©ÇcíXÃşÈ€?À-\0¡Im? .«M¶€\0È¯(Ì‰ıÀ/(%Œ\0");}elseif($_GET["file"]=="default.css"){header("Content-Type: text/css; charset=utf-8");echo
lzw_decompress("\n1Ì‡“ÙŒŞl7œ‡B1„4vb0˜Ífs‘¼ên2BÌÑ±Ù˜Şn:‡#(¼b.\rDc)ÈÈa7E„‘¤Âl¦Ã±”èi1Ìs˜´ç-4™‡fÓ	ÈÎi7†³é†„ŒFÃ©”vt2‚Ó!–r0Ïãã£t~½U'3M€ÉW„B¦'cÍPÂ:6T\rc£A¾zr_îWK¶\r-¼VNFS%~Ãc²Ùí&›\\^ÊrÀ›­æu‚ÅÃôÙ‹4'7k¶è¯ÂãQÔæhš'g\rFB\ryT7SS¥PĞ1=Ç¤cIèÊ:d”ºm>£S8L†Jœt.M¢Š	Ï‹`'C¡¼ÛĞ889¤È QØıŒî2#8Ğ­£’˜6mú²†ğjˆ¢h«<…Œ°«Œ9/ë˜ç:Jê)Ê‚¤\0d>!\0Z‡ˆvì»në¾ğ¼o(Úó¥ÉkÔ7½sàù>Œî†!ĞR\"*nSı\0@P\"Áè’(‹#[¶¥£@g¹oü­’znş9k¤8†nš™ª1´I*ˆô=Ín²¤ª¸è0«c(ö;¾Ã Ğè!°üë*cì÷>Î¬E7DñLJ© 1Èä·ã`Â8(áÕ3M¨ó\"Ç39é?Ee=Ò¬ü~ù¾²ôÅîÓ¸7;ÉCÄÁ›ÍE\rd!)Âa*¯5ajo\0ª#`Ê38¶\0Êí]“eŒêˆÆ2¤	mk×øe]…Á­AZsÕStZ•Z!)BR¨G+Î#Jv2(ã öîc…4<¸#sB¯0éú‚6YL\r²=£…¿[×73Æğ<Ô:£Šbx”ßJ=	m_ ¾ÏÅfªlÙ×t‹åIªƒHÚ3x*€›á6`t6¾Ã%UÔLòeÙ‚˜<´\0ÉAQ<P<:š#u/¤:T\\> Ë-…xJˆÍQH\nj¡L+jİzğó°7£•«`İğ³\nkƒƒ'“NÓvX>îC-TË©¶œ¸†4*L”%Cj>7ß¨ŠŞ¨­õ™`ù®œ;yØûÆqÁrÊ3#¨Ù} :#ní\rã½^Å=CåAÜ¸İÆs&8£K&»ô*0ÑÒtİSÉÔÅ=¾[×ó:\\]ÃEİŒ/Oà>^]ØÃ¸Â<èØ÷gZÔV†éqº³ŠŒù ñËx\\­è•ö¹ßŞº´„\"J \\Ã®ˆû##Á¡½D†Îx6êœÚ5xÊÜ€¸¶†¨\rHøl ‹ñø°bú r¼7áÔ6†àöj|Á‰ô¢Û–*ôFAquvyO’½WeM‹Ö÷‰D.Fáö:RĞ\$-¡Ş¶µT!ìDS`°8D˜~ŸàA`(Çemƒ¦òı¢T@O1@º†X¦â“\nLpğ–‘PäşÁÓÂm«yf¸£)	‰«ÂˆÚGSEI‰¥xC(s(a?\$`tE¨n„ñ±­,÷Õ \$a‹U>,èĞ’\$ZñkDm,G\0å \\iú£%Ê¹¢ n¬¥¥±·ìİÜgÉ„b	y`’òÔ†ËWì· ä——¡_CÀÄT\niÏH%ÕdaÀÖiÍ7íAt°,Á®J†X4nˆ‘”ˆ0oÍ¹»9g\nzm‹M%`É'Iü€Ğ-èò©Ğ7:pğ3pÇQ—rEDš¤×ì àb2]…PF ı¥É>eÉú†3j\n€ß°t!Á?4ftK;£Ê\rÎĞ¸­!àoŠu?ÓúPhÒ0uIC}'~ÅÈ2‡vşQ¨ÒÎ8)ìÀ†7ìDIù=§éy&•¢eaàs*hÉ•jlAÄ(ê›\"Ä\\Óêm^i‘®M)‚°^ƒ	|~Õl¨¶#!YÍf81RS Áµ!‡†è62PÆC‘ôl&íûäxd!Œ| è9°`Ö_OYí=ğÑGà[EÉ-eLñCvT¬ )Ä@j-5¨¶œpSg».’G=”ĞZEÒö\$\0¢Ñ†KjíU§µ\$ ‚ÀG'IäP©Â~ûÚğ ;ÚhNÛG%*áRjñ‰X[œXPf^Á±|æèT!µ*NğğĞ†¸\rU¢Œ^q1V!ÃùUz,ÃI|7°7†r,¾¡¬7”èŞÄ¾BÖùÈ;é+÷¨©ß•ˆAÚpÍÎ½Ç^€¡~Ø¼W!3PŠI8]“½vÓJ’Áfñq£|,êè9Wøf`\0áqˆAÖwE¬àçÕ´¦F‡‘ŠÙTî«QÕ‘GÎù\$0Ç“Ê #Ç%By7r¨i{eÍQÔŸòˆd„ìÇ‡ ÌB4;ks(å0İÁ=1r)_<¿”Ø;Ì¹çSŒÛr  &YÇ,h,®ŸiiÙƒÕÁbÉÌ¢A–é ¼åG±´L˜z2p(¦ÏÙõ”‰ƒ0À°Š›ÂL	¡¹SÅú¨¨EêÀ˜	<©ÄÇ}_#\\fª¨daÊ„çKå3¼Y|V+êl@²0`;ÅàËLhÅä±ÁŞ¯j'™›˜öàÆ™»Yâ+¶‰QZ-iôœyvƒ–I™5Ú“0O|½PÖ]FÜáòÓùñ\0üË2™D9Í¢™¤Án/Ï‡QØ³&¦ªI^®=Ól©qfIÆÊ= Ö]xqGRüF¦e¹7éº)Šó9*Æ:B²b±>a¦z‡-µ‰Ñ2.¯ö¬¸b{°ğ4#„¥¼òÄUá“ÆL7-¼Áv/;Ê5ñ’ôu©ÊöHå§&²#÷³¤jÖ`ÕG—8Î “7pùØğÒ YCÁĞ~ÁÈ:À@ÆŞEU‰JÜÛ;v7v]¶J'ØŞäq1ï·éElô™Ğ†i¾ÍÃÏ„/íÿ{k<àÖ¡MÜpoí}ğéÁ¤±•Ù,ìdÃ¦Ù_uÓ—ïÂpºuŞ½Åùúüú=»‘·tnş´™	ıŸ™~×Lxîøæ‹Ö{kàß‡åŞù\rj~·P+ÿç0ĞuòowÚyu\$Üèß·î\nd¥Ém´ZdÀ8i`¤=ûÛgğ<§˜ùÛ“ìáÍˆ*+3jŒ¦ÌüÜ<[Œ\0²®ÿ/PÍ­BÿÎr±„ö`Ë`½#xå+B?#öÜ^;Ob\r¨èù¯4øÏ\n÷Ìæ¿0\núô¿0\\×0>Pø@ú¯À2‚lÆÂjÒOªëŒÿ¨(_î<çW\$Ùgºø G­t×@ûl.‡hœSiÆ¾°¬PH\n¦Jëâ‹ëèLDà");}elseif($_GET["file"]=="functions.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress("f:›ŒgCI¼Ü\n8œÅ3)°Ë7œ…†81ĞÊx:\nOg#)Ğêr7\n\"†è´`ø|2ÌgSi–H)N¦S‘ä§\r‡\"0¹Ä@ä)Ÿ`(\$s6O!ÓèœV/=Œ' T4æ=„˜iS˜6IO“ÊerÙxî9*Åº°ºn3\rÑ‰vƒCÁ`õšİ2G%¨YãæáşŸ1™Ífô¹ÑÈ‚l¤Ã1‘\ny£*pC\r\$ÌnTª•3=\\‚r9O\"ã	Ààl<Š\rÇ\\€³I,—s\nA¤Æeh+Mâ‹!q0™ıf»`(¹N{c–—+wËñÁY£–pÙ§3Š3ú˜+I¦Ôj¹ºıÏk·²n¸qÜƒzi#^rØÀº´‹3èâÏ[èºo;®Ë(‹Ğ6#ÀÒ\":cz>ß£C2vÑCXÊ<P˜Ãc*5\nº¨è·/üP97ñ|F»°c0ƒ³¨°ä!ƒæ…!¨œƒ!‰Ã\nZ%ÃÄ‡#CHÌ!¨Òr8ç\$¥¡ì¯,ÈRÜ”2…Èã^0·á@¤2Œâ(ğ88P/‚à¸İ„á\\Á\$La\\å;càH„áHX„•\nÊƒtœ‡á8A<ÏsZô*ƒ;IĞÎ3¡Á@Ò2<Š¢¬!A8G<Ôj¿-Kƒ({*\r’Åa1‡¡èN4Tc\"\\Ò!=1^•ğİM9O³:†;jŒŠ\rãXÒàL#HÎ7ƒ#Tİª/-´‹£pÊ;B Â‹\n¿2!ƒ¥Ít]apÎİî\0RÛCËv¬MÂI,\rö§\0Hv°İ?kTŞ4£Š¼óuÙ±Ø;&’ò+&ƒ›ğ•µ\rÈXbu4İ¡i88Â2Bä/âƒ–4ƒ¡€N8AÜA)52íúøËåÎ2ˆ¨sã8ç“5¤¥¡pçWC@è:˜t…ã¾´Öešh\"#8_˜æcp^ãˆâI]OHşÔ:zdÈ3g£(„ˆ×Ã–k¸î“\\6´˜2ÚÚ–÷¹iÃä7²˜Ï]\rÃxO¾nºpè<¡ÁpïQ®UĞn‹ò|@çËó#G3ğÁ8bA¨Ê6ô2Ÿ67%#¸\\8\rıš2Èc\ræİŸk®‚.(’	’-—J;î›Ñó ÈéLãÏ ƒ¼Wâøã§“Ñ¥É¤â–÷·nû Ò§»æıMÎÀ9ZĞs]êz®¯¬ëy^[¯ì4-ºU\0ta ¶62^•˜.`¤‚â.Cßjÿ[á„ % Q\0`dëM8¿¦¼ËÛ\$O0`4²êÎ\n\0a\rA„<†@Ÿƒ›Š\r!À:ØBAŸ9Ù?h>¤Çº š~ÌŒ—6ÈˆhÜ=Ë-œA7XäÀÖ‡\\¼\r‘Q<èš§q’'!XÎ“2úT °!ŒD\r§Ò,K´\"ç%˜HÖqR\r„Ì ¢îC =í‚ æäÈ<c”\n#<€5Mø êEƒœyŒ¡”“‡°úo\"°cJKL2ù&£ØeRœÀWĞAÎTwÊÑ‘;åJˆâá\\`)5¦ÔŞœBòqhT3§àR	¸'\r+\":– Øğà.“ÑZM'|¬et:3%LÜË#Â‘f!ñhà×€eŒ³œÙ+Ä¼­Ná¹	Á½_’CXŠGî˜1†µi-Ã£z\$’oK@O@TÒ=&‰0\$	àDA‘›¥ùùDàªSJèx9×FÈˆml¨Èp»GÕ­¤T6RfÀ@ƒa¾\rs´RªFgih]¥éf™.•7+Ñ<nhh’* ÈSH	P]¡ :Ò’¨Áa\"¨Õù¬2¦&R©)ùB¦PÊ™ÓH/õf {r|¨0^ÙhCAÌ0»@æMÎâç2“B”@©âzªUŠ‘¾O÷ş‰Cpp’å\\¾L«%è¬ğ›„’y«çodÃ¥•‰´p3·Š7E¸—ĞÜA\\°ö†KƒÛXn‚Øi.ĞZ×Í óŸ˜s¡‰Gım^tIòY‘J’üÙ±•G1€£R¨³D’c–äà6•tMihÆä9ƒ»9gƒq—RL–ûMj-TQÍ6i«G_!í.½hªvŞûcN¨Œı¸—^üÑ0w@n|ı½×VûÜ«˜AĞ­ÃÀ3ú[Úû]	s7õG†P@ :Ì1Ñ‚ØbØ µìİŸ›’wÏ(i³ø:Òåz\\ûº;Óù´AéPU T^£]9İ`UX+U î‹Q+‰ÃbÌÀñ*Ï”s¨¼€–—Î[ßÛ‰xkûF*ô‚İ§_w.òÅ6~òbÛÎmKì¾sIŞMKÉ}ï•Ò¥ÚøåeHÉ²ˆdµ*mdçlœQ°eHô2½ÔL¨ aÒ‚¯=…³sëPøaM\"apÃÀ:<á…äGB”\r2Ytx&L}}‘ßAÏÔ±N…GĞ¬za”öD4øtÔ4QÉvS©Ã¹S\rÎ;U¸ê¦éäı¸´Æ~’pBğƒ{¶ÑÆ,œ—¢O´ãt;ÇJ¡™ZC,&Yº:Y\"İ#‰ÜãÄt:\n‘h8r¯¡îÚnéÔÈh>„>Zğø`&àaŞpY+¹x¬UÕıA¼<?ã”PxWÕ¡¯W™	i¬Ë.É\r`÷\$,Àú©Ò¾‹³V¥]ŒZr›ä§H³ˆ5Æf\\º-KÆ©¦v¼•Zçä®A¸Õ(§{3­o›ó¿¡l.¿ì¹JéÅ.ç\\t2æ;¯ì2\0´Í>c+|ÁĞ*;-0înÂà[t@ÛÚ•ò¢¤=cQ\n.z‰•ÉwC&‡Ô@‘ù¦FæÕˆ‡'cBS7_*rsÑ¨Ô?jğ3@–ˆôĞ!ğ.@7sŠ]ÓªòL÷ÎGŸğ@ÿÕ_­qÕ&uûØótª\nÕ´LßEĞT¤ğ­}gG–ş¸îwëoö(*˜ªğ†›Aí¯-¥Åù¢Õ3¿mk¾…÷°¶×¤«Ÿt·¢Sø¥Á(ûd±Aî~ïx\n×õô§kÕÏ£:DŸø+Ÿ‘ gãäh14 Öâ\n.øÏdê«–ãì’ öşéAlYÂ©jš©êjJœÇÅPN+b D°j¼¬€îÔ€DªŞPäì€LQ`Of–£@Ø}(ÅÂ6^nB³4Û`ÜeÀ\n€š	…trp!lV¤'}b‰*€r%|\nr\r#°Ä@w®¼-ÔT.Vvâ8ìªæ\nmF¦/Èp¬Ï`úY0¬Ïâë­è€P\r8ÀY\r‡Øİ¤’	ÀQ‡%EÎ/@]\0ÊÀ{@ÌQØá\0bR M\r†Ù'|¢è%0SDr¨È f/–àÂÜb:Ü­¯¶ŞÃÂ%ß€æ3H¦x\0Âl\0ÌÅÚ	‘€Wàß%Ú\nç8\r\0}îD„É1d#±x‚ä.€jEoHrÇ¢lbÀØÚ%tì¦4¸p„Àä%Ñ4’åÒk®z2\rñ£`îW@Â’ç%\rJ‚1€‚X ¤Ú1¾D6!°ô†*‡ä²{4<E¦‹k.më4Äò×€\r\nê^iÀ è³!n«²!2\$§ÈüÌ÷(îfñöÄìÄùk>ï¢ÅËNú‚5\$Œàé2T¾,ÖLÄ‚¬ ¶ Z@ºí*Ğ`^PğP%5%ªt‘HâWÀğonüö«E#föÒ<Ú2@K:Ìošùò’ÌÏ¦Í-èû2\\Wi+f›&Ñòg&²níLõ'eÒ|‚²´¿nK¥2ûrÚ¶Ëpá*.ánü²’Î¦‰‚‚*Ğ+ªtBg* òQ…1+)1hªŠî^‹`Q#ñØân*hòàòv¢Bãñ\0\\F\n†WÅr f\$ó=4\$G4ed b˜:J^!“0€‰_àû¦%2ÀË6³.F€ÑèÒºóEQÁ±‚²Îdts\"×„‘’B(`Ú\rÀš®c€R©°°ñV®²”óºXêâ:RŸ*2E*sÃ\$¬Ï+Á:bXlÌØtb‹á-ÄÂ›S>’ù-åd¢=äò\$Sø\$å2ÀÊ7“jº\"[Ì\"€È] [6“€SE_>åq.\$@z`í;ô4²3Ê¼ÅCSÕ*ïª[ÀÒÀ{DO´ŞªCJjå³šPò:'€èÈ• QEÓ–æ`%rñ¯û7¯şG+hW4E*ÀĞ#TuFj•\n¾eùDô^æsš§r.ì‰ÅRkæ€z@¶@»…³Dâ`CÂV!Cæå•\0ñØÛŠ)3<Q4@Ù3SP‡âZB³5F€Lä¨~G³5ÈÒ:ñÂÓ5\$XÑÔö}ÆfŠËâI€ó3S8ñ\0XÔ‚td³<\nbtNç Q¢;\rÜÑH‚ÕP\0Ô¯&\n‚à\$VÒ\r:Ò\0]V5gV¦„òD`‡N1:ÓSS4Q…4³N•5u“5Ó`x	Ò<5_FHÜßõ}7­û)€SVíÌÄ#ê|‚Õ< Õ¼ÑË°£ ·\\ İ-Êz2³\0ü#¡WJU6kv·µÎ#µÒ\rµì·¤§ÀûUõöiÕï_îõ^‚UVJ|Y.¨É›\0u,€òğôæ°õ_UQD#µZJuƒXtñµ_ï&JO,Du`N\r5³Á`«}ZQM^mÌPìG[±Áa»bàNä® ÖreÚ\n€Ò%¤4š“o_(ñ^¶q@Y6t;I\nGSM£3§×^SAYH hB±5 fN?NjWU•JĞÂøÖ¯YÖ³ke\"\\B1Ø…0º µenĞÄí*<¥O`S’L—\n‘Ú.gÍ5Zj¡\0R\$åh÷n÷[¶\\İíñrŒÊ,æ4ğœ° cP§pq@Rµrw>‹wCK‘…t¶ }5_uvh¤Ó`/Àúà\$ò–J)ÏRõ2Du73Öd\rÂ;­çw´İöHùI_\"4±rµ«®¦Ï¿+ê¿&0>É_-eqeDöÍVÔnŒÄf‹hüÂ\"ZÀ¨¶óZ¢WÌ6\\Lî¶·ê÷î·ke&ã~‡ààš…‘i\$Ï°´Mr×i*×ÄâÔç\0Ì.Q,¶¢8\r±È¸\$×­K‚ÈYƒ ĞioÍe%tÕ2ÿ\0äJıø~×ñ/I/.…e€€n«~x!€8´À|f¸hÛ„-H×åÏ&˜/„Æo‡­‡ø‚.K” Ë^jÜÀtµé>('L\r€àHsK1´e¤\0Ÿ\$&3²\0æin3í¨ oä“6ôĞ¶ø®÷ô§9j°¸àÈÚ1‰(b.”vC İ8ŒÙ:wi¬Ÿ\"®^wµQ©¥Åïz–o~Ş/„úÒ’÷–÷`Y2”D¬VúÆ³/kã8³¹7ZHø°Šƒ]2k2rœ¿ñ›ŠÏ¯h©=ˆT…ˆ]O&§\0ÄM\0Ö[8–‡È®…æ–â8&LÚVm vÀ±ê˜j„×šÇFåÄ\\™¶	™º¾&så€Q› \\\"òb€°	àÄ\rBsœIw	YéÂN š7ÇC/*ÙË ¨\n\nÃH™[«š¹Ô*A˜ ñTEÏVP.UZ(tz/}\n2‚çyšS¢š,#É3âi°~W@yCC\nKT¿š1\"@|„zC\$ü€_CZjzHBºLVÔ,Kº£º„O—ÁÀPà@X…´…°‰¨ºƒ;DúWZšW¥aÙÀ\0ŞŠÂCG8–R  	à¦\n…„àºĞPÆA£è&šº é,ÚpfV|@N¨b¾\$€[‡I’Š­™âàğ¦´àZ¥@Zd\\\"…|¢ƒ+¢Û®šìtzğo\$â\0[²èŞ±yƒE çë³É™®bhU1£‚,€r\$ãŒo8D§²‡F«ÆV&Ú5 h}ÂNÜÍ³&ºçµ•ef€Ç™Y™¸:»^z©VPu	W¹Z\"rÚ:ûhw˜µh#1¥´O¥äÃKâhq`å¦„óÄ§v| Ë§:wDúj…(W¢ºº­¨›ï¤»õ?;|Z—«%Š%Ú¡Är@[†ŠúÄB»&™»³˜›ú#ª˜©Ù£”:)ÂàY6û²–è&¹Ü	@¦	àœüIÄÒ!›©²»¶ Â»â2M„äO;²«ÑWÆ¼)êùCãÊFZâp!ÂÄa™Ä*FÄb¹I³ÃÍ¾àŒ¤#Ä¤9¡¦åçS©/SüA‰`zé•L*Î8»+¨ÌNù‹Ä-¸M•Ä-kd°®àLiÎJë‚Â·şJnÂÃbí Ó>,ÜV¶SP¯8´è>¶wïì\"E.îƒRz`Ş‹u_ÀèœôE\\ùÏÉ«Ğ3Pç¬óÓ¥s]”•‰goVSƒ±ñ„\n ¤	*†\r»¸7)ªÊ„ümPWİUÕ€ßÕÇ°¨·Şf”×Ü“iÿÆ…kĞŒ\rÄ('W`ŞBdã/h*†AÌlºMä€_\nÀèüú½µëOªäT‚5Ú&AÀ2Ã©`¸à\\RÑE\"_–_œ½.7¥Mœ6d;¶<?ÈÜ)(;¾û‰}K¸[«Åû»ÆZ?ÕyI ÷á1pªbu\0èéˆ²²Œ£{ó£Å\ri„sÉQQ¦Y§2ª…\r×”0\0XØ\"@qÍuMböÓuJ6ÉNGÖş–^ÓÔwF/t’õ°#P¾p÷Í!7Øı­…å›œ!Ã»é^Vü„M–!(â©€8ÖÍ=¥\0å¥@˜¿í80N¬Sà½¾°QĞ_TÏàÄ¥şqSz\"Õ&hã\0R.\0hZÓfx‡ ÜF9¶Q(Ób³=ÄD&xs=X›bu@oÎwƒd“5ñÇİP1P>k¸ŠHöD6/Ú¿íqë¼¾Î3¥7TĞ¬KÈ~54°	ñt#µM–\rctx‹gçT˜æX\r‚2\$í<0øy}*ßÿCbiÆ^ó†±ÄL‡7	bäoùŒÓÊx71 b€XS`OÀàá­0)ù¨Ú\"®/†•=È¬ ¸lÊá˜QöpÍ-˜!ıà{ıõ€±©–Öâa„ÃÈ•9bAg¶2,1zf£kàÈj„h/o(’.4‰\rıƒàTz&nw¶”Ä7 X!ğûŸª@,»<—	“ı`\"@:†¼7ÃCX\\	 \$1H\n=Ä›¡O5Œ°&ºv*(	àtHÑ#É\nê_X/8•k~+t€—O&<v‰Í_Yh‚€.ØMe€HxpáI¨a‡ù0ÕM\nhø`r'B…¥ÃhÓn8qÑ‡!	åÖ eu»«]^TW­Š‘Öd9{û¾H,ã—‚8ÅüL­a«,!\0;ÆîB#É#ÁÒ`ò)³¯Ÿ™–	Å„aèEeòÚ‘Ü/MèPÓ	“l„ğÉa`	¥sâ²…<(D\nöá¡À9{06œÆˆ;A8¶¸5!	 ÍÀZ[Tâ© hV… »Ü»Åé¯U@än`ÆVp¥h(Rb4ÆVôÆ‰¼¸ÒÈRp€¢Ò”\$ª™ĞŞD3O¡¾õÔ\$€öÃÓaQ²¯0xbŒH` ®ĞâLÃ”8i¾èoC‹½àúğ#6”xÊ)XHĞ!`÷íÀô‹ÆÔBÖ%wÑÂÇo\nxÌ€h®ÁH‹»ˆr¦ Ê¼cóœÀmJHáLUğÜäÆe1l`ü(Õ\$\"¾h†JÒrvØíÓTPÁĞØ·ó1uï¢‡HA\0èèH2@(Ê¡Uà\"©Q@qg]l\"¨%©ú*«\0WŠj[ †·eÃ4êõÆPúÂN”‚àê5\$H\r¼îIP„'@:\0è\"#t^†D­0Åè“å«>ƒ(œ’h· 'œ¼F,sZJôèµAn¯#‰h ªX³—.q‹YobÚˆ·Ò2¨Ş?j¼€B÷I–ôß£€›¥ÖÛôù0†aû(ñ`ZñCÁà¯rššHSQîÆ\\‚‡W	¼€XZ÷Í|¹E@âÂTÔÅ–qğ DD:_yÕ¯Ä°±©B~ßxP±--e‚‡_äu‹|2(³G,Æåˆ-rR KxîÕ d¡ÃhHìA|ôŒw„|PÁ!Ç‰Ò‘ä¬}ÜTùÇÖ<Ñù,1ÑÕvêg*Ù¤ïz¯^€«÷¤œñ_pi {€ØGÕíİÿ	LaJJC–T%N1‡ÒI:V@ZÔÁ%É‚*Ô|@NNxLL€zd \$8b#Û!2=cÛ±QDŠí@½\0±Jàdzpû¯\$Aî|ya4)¤”s%!ğ¥BI’Q]d˜G´6&E\$˜…H\$Rj\0œ‡·Ü—Gi\$Ø¥â9Å†YúĞ@Ê´0ñ6Ä¦‘ºXÒÜ1&L•ç&2Ì	E^äa8öj¦#¸DEu€\$uTÌ*R¥#&ˆ‚P2•e¥äKƒ«'šE%â”¡’YWáJ•ôŒ	”©ö™O`ƒÊ•·€^l+¦„`¨	R¹1uƒ&F˜¸¥Z[)]J¬ZÃE•Ñ`±¶FN.\r•=ÀØ  ³\0´O~‰ÒÅM,«…FATÌb™hèz0‰`-bl‹\nñÇ…Z '—*I†n°\$â[’,8D‡Ÿn«¨`°˜ÒóI0uÑ0åŞEJé¸†Xceì2P‡‚ bûÀ]èõÌ5:ê²“º'xT	‰'bOYº‘V>&·–AÏ.PpûÅ­\${)9\"iˆcª–úÇ™•L¡ P”K½Tğ¸9ÁÕ×0wZ\"b	”)à©ÃR û&„É¢ÁºÍ&ÉX+™’ºs%[¤~&aF•Íi.:„Ka5@§­øqÈÎÉpGª˜hlÍn³0yÛH,W>ÑJ®!™‘®&¥2Y–±ŞlAp™ˆ¯-3§]ˆ¨±2CŒMZ–î’ŠøH¯oÚd1Dl±uS\"´ºMµTz\$h\\c²Øòæw<ÅcO3?zËÍàp%@\0…4\nìZèÓ—„§¥f*\r÷“°|ºÙ„;3âMÈRm¯º ™w¦X·¹Ï.YL°›óª]Wg]¹ş\rèƒœ1@U8•¤e3U›ÛŸ–Dê	zÀ'ˆ¸‡&½#huàa1CÂ0‘{phÍ”\n?Ğë¤YKÔB™ˆìYÜÁA9©,´F ¨wĞ");}elseif($_GET["file"]=="jush.js"){header("Content-Type: text/javascript; charset=utf-8");echo
lzw_decompress('');}else{header("Content-Type: image/gif");switch($_GET["file"]){case"plus.gif":echo'';break;case"cross.gif":echo'';break;case"up.gif":echo'';break;case"down.gif":echo'';break;case"arrow.gif":echo'';break;}}exit;}if($_GET["script"]=="version"){$_c=file_open_lock(get_temp_dir()."/adminer.version");if($_c)file_write_unlock($_c,serialize(array("signature"=>$_POST["signature"],"version"=>$_POST["version"])));exit;}global$b,$h,$n,$Fb,$Kb,$Sb,$o,$Cc,$Gc,$aa,$fd,$x,$ba,$vd,$he,$Ce,$Of,$Kc,$mg,$qg,$yg,$Eg,$ca;if(!$_SERVER["REQUEST_URI"])$_SERVER["REQUEST_URI"]=$_SERVER["ORIG_PATH_INFO"];if(!strpos($_SERVER["REQUEST_URI"],'?')&&$_SERVER["QUERY_STRING"]!="")$_SERVER["REQUEST_URI"].="?$_SERVER[QUERY_STRING]";if($_SERVER["HTTP_X_FORWARDED_PREFIX"])$_SERVER["REQUEST_URI"]=$_SERVER["HTTP_X_FORWARDED_PREFIX"].$_SERVER["REQUEST_URI"];$aa=($_SERVER["HTTPS"]&&strcasecmp($_SERVER["HTTPS"],"off"))||ini_bool("session.cookie_secure");@ini_set("session.use_trans_sid",false);if(!defined("SID")){session_cache_limiter("");session_name("adminer_sid");$E=array(0,preg_replace('~\?.*~','',$_SERVER["REQUEST_URI"]),"",$aa);if(version_compare(PHP_VERSION,'5.2.0')>=0)$E[]=true;call_user_func_array('session_set_cookie_params',$E);session_start();}remove_slashes(array(&$_GET,&$_POST,&$_COOKIE),$mc);if(get_magic_quotes_runtime())set_magic_quotes_runtime(false);@set_time_limit(0);@ini_set("zend.ze1_compatibility_mode",false);@ini_set("precision",15);function
get_lang(){return'pl';}function
lang($pg,$de=null){if(is_array($pg)){$Fe=($de==1?0:($de%10>1&&$de%10<5&&$de/10%10!=1?1:2));$pg=$pg[$Fe];}$pg=str_replace("%d","%s",$pg);$de=format_number($de);return
sprintf($pg,$de);}if(extension_loaded('pdo')){class
Min_PDO
extends
PDO{var$_result,$server_info,$affected_rows,$errno,$error;function
__construct(){global$b;$Fe=array_search("SQL",$b->operators);if($Fe!==false)unset($b->operators[$Fe]);}function
dsn($Ib,$V,$F,$C=array()){try{parent::__construct($Ib,$V,$F,$C);}catch(Exception$Wb){auth_error(h($Wb->getMessage()));}$this->setAttribute(13,array('Min_PDOStatement'));$this->server_info=@$this->getAttribute(4);}function
query($G,$zg=false){$I=parent::query($G);$this->error="";if(!$I){list(,$this->errno,$this->error)=$this->errorInfo();if(!$this->error)$this->error='Unknown error.';return
false;}$this->store_result($I);return$I;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result($I=null){if(!$I){$I=$this->_result;if(!$I)return
false;}if($I->columnCount()){$I->num_rows=$I->rowCount();return$I;}$this->affected_rows=$I->rowCount();return
true;}function
next_result(){if(!$this->_result)return
false;$this->_result->_offset=0;return@$this->_result->nextRowset();}function
result($G,$p=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch();return$K[$p];}}class
Min_PDOStatement
extends
PDOStatement{var$_offset=0,$num_rows;function
fetch_assoc(){return$this->fetch(2);}function
fetch_row(){return$this->fetch(3);}function
fetch_field(){$K=(object)$this->getColumnMeta($this->_offset++);$K->orgtable=$K->table;$K->orgname=$K->name;$K->charsetnr=(in_array("blob",(array)$K->flags)?63:0);return$K;}}}$Fb=array();class
Min_SQL{var$_conn;function
__construct($h){$this->_conn=$h;}function
select($R,$M,$Z,$Dc,$pe=array(),$z=1,$D=0,$Ke=false){global$b,$x;$ld=(count($Dc)<count($M));$G=$b->selectQueryBuild($M,$Z,$Dc,$pe,$z,$D);if(!$G)$G="SELECT".limit(($_GET["page"]!="last"&&$z!=""&&$Dc&&$ld&&$x=="sql"?"SQL_CALC_FOUND_ROWS ":"").implode(", ",$M)."\nFROM ".table($R),($Z?"\nWHERE ".implode(" AND ",$Z):"").($Dc&&$ld?"\nGROUP BY ".implode(", ",$Dc):"").($pe?"\nORDER BY ".implode(", ",$pe):""),($z!=""?+$z:null),($D?$z*$D:0),"\n");$Kf=microtime(true);$J=$this->_conn->query($G);if($Ke)echo$b->selectQuery($G,$Kf,!$J);return$J;}function
delete($R,$H,$z=0){$G="FROM ".table($R);return
queries("DELETE".($z?limit1($R,$G,$H):" $G$H"));}function
update($R,$P,$H,$z=0,$N="\n"){$Mg=array();foreach($P
as$y=>$X)$Mg[]="$y = $X";$G=table($R)." SET$N".implode(",$N",$Mg);return
queries("UPDATE".($z?limit1($R,$G,$H,$N):" $G$H"));}function
insert($R,$P){return
queries("INSERT INTO ".table($R).($P?" (".implode(", ",array_keys($P)).")\nVALUES (".implode(", ",$P).")":" DEFAULT VALUES"));}function
insertUpdate($R,$L,$Ie){return
false;}function
begin(){return
queries("BEGIN");}function
commit(){return
queries("COMMIT");}function
rollback(){return
queries("ROLLBACK");}function
slowQuery($G,$eg){}function
convertSearch($u,$X,$p){return$u;}function
value($X,$p){return(method_exists($this->_conn,'value')?$this->_conn->value($X,$p):(is_resource($X)?stream_get_contents($X):$X));}function
quoteBinary($kf){return
q($kf);}function
warnings(){return'';}function
tableHelp($B){}}$Fb["sqlite"]="SQLite 3";$Fb["sqlite2"]="SQLite 2";if(isset($_GET["sqlite"])||isset($_GET["sqlite2"])){$Ge=array((isset($_GET["sqlite"])?"SQLite3":"SQLite"),"PDO_SQLite");define("DRIVER",(isset($_GET["sqlite"])?"sqlite":"sqlite2"));if(class_exists(isset($_GET["sqlite"])?"SQLite3":"SQLiteDatabase")){if(isset($_GET["sqlite"])){class
Min_SQLite{var$extension="SQLite3",$server_info,$affected_rows,$errno,$error,$_link;function
__construct($r){$this->_link=new
SQLite3($r);$Og=$this->_link->version();$this->server_info=$Og["versionString"];}function
query($G){$I=@$this->_link->query($G);$this->error="";if(!$I){$this->errno=$this->_link->lastErrorCode();$this->error=$this->_link->lastErrorMsg();return
false;}elseif($I->numColumns())return
new
Min_Result($I);$this->affected_rows=$this->_link->changes();return
true;}function
quote($Q){return(is_utf8($Q)?"'".$this->_link->escapeString($Q)."'":"x'".reset(unpack('H*',$Q))."'");}function
store_result(){return$this->_result;}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetchArray();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return$this->_result->fetchArray(SQLITE3_ASSOC);}function
fetch_row(){return$this->_result->fetchArray(SQLITE3_NUM);}function
fetch_field(){$f=$this->_offset++;$U=$this->_result->columnType($f);return(object)array("name"=>$this->_result->columnName($f),"type"=>$U,"charsetnr"=>($U==SQLITE3_BLOB?63:0),);}function
__desctruct(){return$this->_result->finalize();}}}else{class
Min_SQLite{var$extension="SQLite",$server_info,$affected_rows,$error,$_link;function
__construct($r){$this->server_info=sqlite_libversion();$this->_link=new
SQLiteDatabase($r);}function
query($G,$zg=false){$Sd=($zg?"unbufferedQuery":"query");$I=@$this->_link->$Sd($G,SQLITE_BOTH,$o);$this->error="";if(!$I){$this->error=$o;return
false;}elseif($I===true){$this->affected_rows=$this->changes();return
true;}return
new
Min_Result($I);}function
quote($Q){return"'".sqlite_escape_string($Q)."'";}function
store_result(){return$this->_result;}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->_result->fetch();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;if(method_exists($I,'numRows'))$this->num_rows=$I->numRows();}function
fetch_assoc(){$K=$this->_result->fetch(SQLITE_ASSOC);if(!$K)return
false;$J=array();foreach($K
as$y=>$X)$J[($y[0]=='"'?idf_unescape($y):$y)]=$X;return$J;}function
fetch_row(){return$this->_result->fetch(SQLITE_NUM);}function
fetch_field(){$B=$this->_result->fieldName($this->_offset++);$Be='(\[.*]|"(?:[^"]|"")*"|(.+))';if(preg_match("~^($Be\\.)?$Be\$~",$B,$A)){$R=($A[3]!=""?$A[3]:idf_unescape($A[2]));$B=($A[5]!=""?$A[5]:idf_unescape($A[4]));}return(object)array("name"=>$B,"orgname"=>$B,"orgtable"=>$R,);}}}}elseif(extension_loaded("pdo_sqlite")){class
Min_SQLite
extends
Min_PDO{var$extension="PDO_SQLite";function
__construct($r){$this->dsn(DRIVER.":$r","","");}}}if(class_exists("Min_SQLite")){class
Min_DB
extends
Min_SQLite{function
__construct(){parent::__construct(":memory:");$this->query("PRAGMA foreign_keys = 1");}function
select_db($r){if(is_readable($r)&&$this->query("ATTACH ".$this->quote(preg_match("~(^[/\\\\]|:)~",$r)?$r:dirname($_SERVER["SCRIPT_FILENAME"])."/$r")." AS a")){parent::__construct($r);$this->query("PRAGMA foreign_keys = 1");return
true;}return
false;}function
multi_query($G){return$this->_result=$this->query($G);}function
next_result(){return
false;}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Ie){$Mg=array();foreach($L
as$P)$Mg[]="(".implode(", ",$P).")";return
queries("REPLACE INTO ".table($R)." (".implode(", ",array_keys(reset($L))).") VALUES\n".implode(",\n",$Mg));}function
tableHelp($B){if($B=="sqlite_sequence")return"fileformat2.html#seqtab";if($B=="sqlite_master")return"fileformat2.html#$B";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
get_databases(){return
array();}function
limit($G,$Z,$z,$fe=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($fe?" OFFSET $fe":""):"");}function
limit1($R,$G,$Z,$N="\n"){global$h;return(preg_match('~^INTO~',$G)||$h->result("SELECT sqlite_compileoption_used('ENABLE_UPDATE_DELETE_LIMIT')")?limit($G,$Z,1,0,$N):" $G WHERE rowid = (SELECT rowid FROM ".table($R).$Z.$N."LIMIT 1)");}function
db_collation($m,$cb){global$h;return$h->result("PRAGMA encoding");}function
engines(){return
array();}function
logged_user(){return
get_current_user();}function
tables_list(){return
get_key_vals("SELECT name, type FROM sqlite_master WHERE type IN ('table', 'view') ORDER BY (name = 'sqlite_sequence'), name");}function
count_tables($l){return
array();}function
table_status($B=""){global$h;$J=array();foreach(get_rows("SELECT name AS Name, type AS Engine, 'rowid' AS Oid, '' AS Auto_increment FROM sqlite_master WHERE type IN ('table', 'view') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$K){$K["Rows"]=$h->result("SELECT COUNT(*) FROM ".idf_escape($K["Name"]));$J[$K["Name"]]=$K;}foreach(get_rows("SELECT * FROM sqlite_sequence",null,"")as$K)$J[$K["name"]]["Auto_increment"]=$K["seq"];return($B!=""?$J[$B]:$J);}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){global$h;return!$h->result("SELECT sqlite_compileoption_used('OMIT_FOREIGN_KEY')");}function
fields($R){global$h;$J=array();$Ie="";foreach(get_rows("PRAGMA table_info(".table($R).")")as$K){$B=$K["name"];$U=strtolower($K["type"]);$xb=$K["dflt_value"];$J[$B]=array("field"=>$B,"type"=>(preg_match('~int~i',$U)?"integer":(preg_match('~char|clob|text~i',$U)?"text":(preg_match('~blob~i',$U)?"blob":(preg_match('~real|floa|doub~i',$U)?"real":"numeric")))),"full_type"=>$U,"default"=>(preg_match("~'(.*)'~",$xb,$A)?str_replace("''","'",$A[1]):($xb=="NULL"?null:$xb)),"null"=>!$K["notnull"],"privileges"=>array("select"=>1,"insert"=>1,"update"=>1),"primary"=>$K["pk"],);if($K["pk"]){if($Ie!="")$J[$Ie]["auto_increment"]=false;elseif(preg_match('~^integer$~i',$U))$J[$B]["auto_increment"]=true;$Ie=$B;}}$Hf=$h->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));preg_match_all('~(("[^"]*+")+|[a-z0-9_]+)\s+text\s+COLLATE\s+(\'[^\']+\'|\S+)~i',$Hf,$Jd,PREG_SET_ORDER);foreach($Jd
as$A){$B=str_replace('""','"',preg_replace('~^"|"$~','',$A[1]));if($J[$B])$J[$B]["collation"]=trim($A[3],"'");}return$J;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Hf=$i->result("SELECT sql FROM sqlite_master WHERE type = 'table' AND name = ".q($R));if(preg_match('~\bPRIMARY\s+KEY\s*\((([^)"]+|"[^"]*"|`[^`]*`)++)~i',$Hf,$A)){$J[""]=array("type"=>"PRIMARY","columns"=>array(),"lengths"=>array(),"descs"=>array());preg_match_all('~((("[^"]*+")+|(?:`[^`]*+`)+)|(\S+))(\s+(ASC|DESC))?(,\s*|$)~i',$A[1],$Jd,PREG_SET_ORDER);foreach($Jd
as$A){$J[""]["columns"][]=idf_unescape($A[2]).$A[4];$J[""]["descs"][]=(preg_match('~DESC~i',$A[5])?'1':null);}}if(!$J){foreach(fields($R)as$B=>$p){if($p["primary"])$J[""]=array("type"=>"PRIMARY","columns"=>array($B),"lengths"=>array(),"descs"=>array(null));}}$If=get_key_vals("SELECT name, sql FROM sqlite_master WHERE type = 'index' AND tbl_name = ".q($R),$i);foreach(get_rows("PRAGMA index_list(".table($R).")",$i)as$K){$B=$K["name"];$v=array("type"=>($K["unique"]?"UNIQUE":"INDEX"));$v["lengths"]=array();$v["descs"]=array();foreach(get_rows("PRAGMA index_info(".idf_escape($B).")",$i)as$jf){$v["columns"][]=$jf["name"];$v["descs"][]=null;}if(preg_match('~^CREATE( UNIQUE)? INDEX '.preg_quote(idf_escape($B).' ON '.idf_escape($R),'~').' \((.*)\)$~i',$If[$B],$Xe)){preg_match_all('/("[^"]*+")+( DESC)?/',$Xe[2],$Jd);foreach($Jd[2]as$y=>$X){if($X)$v["descs"][$y]='1';}}if(!$J[""]||$v["type"]!="UNIQUE"||$v["columns"]!=$J[""]["columns"]||$v["descs"]!=$J[""]["descs"]||!preg_match("~^sqlite_~",$B))$J[$B]=$v;}return$J;}function
foreign_keys($R){$J=array();foreach(get_rows("PRAGMA foreign_key_list(".table($R).")")as$K){$wc=&$J[$K["id"]];if(!$wc)$wc=$K;$wc["source"][]=$K["from"];$wc["target"][]=$K["to"];}return$J;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`"[]+|`[^`]*`|"[^"]*")* AS\s+~iU','',$h->result("SELECT sql FROM sqlite_master WHERE name = ".q($B))));}function
collations(){return(isset($_GET["create"])?get_vals("PRAGMA collation_list",1):array());}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
check_sqlite_name($B){global$h;$dc="db|sdb|sqlite";if(!preg_match("~^[^\\0]*\\.($dc)\$~",$B)){$h->error=sprintf('ProszÄ™ uÅ¼yÄ‡ jednego z rozszerzeÅ„: %s.',str_replace("|",", ",$dc));return
false;}return
true;}function
create_database($m,$e){global$h;if(file_exists($m)){$h->error='Plik juÅ¼ istnieje.';return
false;}if(!check_sqlite_name($m))return
false;try{$_=new
Min_SQLite($m);}catch(Exception$Wb){$h->error=$Wb->getMessage();return
false;}$_->query('PRAGMA encoding = "UTF-8"');$_->query('CREATE TABLE adminer (i)');$_->query('DROP TABLE adminer');return
true;}function
drop_databases($l){global$h;$h->__construct(":memory:");foreach($l
as$m){if(!@unlink($m)){$h->error='Plik juÅ¼ istnieje.';return
false;}}return
true;}function
rename_database($B,$e){global$h;if(!check_sqlite_name($B))return
false;$h->__construct(":memory:");$h->error='Plik juÅ¼ istnieje.';return@rename(DB,$B);}function
auto_increment(){return" PRIMARY KEY".(DRIVER=="sqlite"?" AUTOINCREMENT":"");}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){$Jg=($R==""||$tc);foreach($q
as$p){if($p[0]!=""||!$p[1]||$p[2]){$Jg=true;break;}}$c=array();$se=array();foreach($q
as$p){if($p[1]){$c[]=($Jg?$p[1]:"ADD ".implode($p[1]));if($p[0]!="")$se[$p[0]]=$p[1][0];}}if(!$Jg){foreach($c
as$X){if(!queries("ALTER TABLE ".table($R)." $X"))return
false;}if($R!=$B&&!queries("ALTER TABLE ".table($R)." RENAME TO ".table($B)))return
false;}elseif(!recreate_table($R,$B,$c,$se,$tc))return
false;if($Ea)queries("UPDATE sqlite_sequence SET seq = $Ea WHERE name = ".q($B));return
true;}function
recreate_table($R,$B,$q,$se,$tc,$w=array()){if($R!=""){if(!$q){foreach(fields($R)as$y=>$p){if($w)$p["auto_increment"]=0;$q[]=process_field($p,$p);$se[$y]=idf_escape($y);}}$Je=false;foreach($q
as$p){if($p[6])$Je=true;}$Hb=array();foreach($w
as$y=>$X){if($X[2]=="DROP"){$Hb[$X[1]]=true;unset($w[$y]);}}foreach(indexes($R)as$qd=>$v){$g=array();foreach($v["columns"]as$y=>$f){if(!$se[$f])continue
2;$g[]=$se[$f].($v["descs"][$y]?" DESC":"");}if(!$Hb[$qd]){if($v["type"]!="PRIMARY"||!$Je)$w[]=array($v["type"],$qd,$g);}}foreach($w
as$y=>$X){if($X[0]=="PRIMARY"){unset($w[$y]);$tc[]="  PRIMARY KEY (".implode(", ",$X[2]).")";}}foreach(foreign_keys($R)as$qd=>$wc){foreach($wc["source"]as$y=>$f){if(!$se[$f])continue
2;$wc["source"][$y]=idf_unescape($se[$f]);}if(!isset($tc[" $qd"]))$tc[]=" ".format_foreign_key($wc);}queries("BEGIN");}foreach($q
as$y=>$p)$q[$y]="  ".implode($p);$q=array_merge($q,array_filter($tc));if(!queries("CREATE TABLE ".table($R!=""?"adminer_$B":$B)." (\n".implode(",\n",$q)."\n)"))return
false;if($R!=""){if($se&&!queries("INSERT INTO ".table("adminer_$B")." (".implode(", ",$se).") SELECT ".implode(", ",array_map('idf_escape',array_keys($se)))." FROM ".table($R)))return
false;$wg=array();foreach(triggers($R)as$ug=>$fg){$tg=trigger($ug);$wg[]="CREATE TRIGGER ".idf_escape($ug)." ".implode(" ",$fg)." ON ".table($B)."\n$tg[Statement]";}if(!queries("DROP TABLE ".table($R)))return
false;queries("ALTER TABLE ".table("adminer_$B")." RENAME TO ".table($B));if(!alter_indexes($B,$w))return
false;foreach($wg
as$tg){if(!queries($tg))return
false;}queries("COMMIT");}return
true;}function
index_sql($R,$U,$B,$g){return"CREATE $U ".($U!="INDEX"?"INDEX ":"").idf_escape($B!=""?$B:uniqid($R."_"))." ON ".table($R)." $g";}function
alter_indexes($R,$c){foreach($c
as$Ie){if($Ie[0]=="PRIMARY")return
recreate_table($R,$R,array(),array(),array(),$c);}foreach(array_reverse($c)as$X){if(!queries($X[2]=="DROP"?"DROP INDEX ".idf_escape($X[1]):index_sql($R,$X[0],$X[1],"(".implode(", ",$X[2]).")")))return
false;}return
true;}function
truncate_tables($T){return
apply_queries("DELETE FROM",$T);}function
drop_views($Qg){return
apply_queries("DROP VIEW",$Qg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
move_tables($T,$Qg,$Yf){return
false;}function
trigger($B){global$h;if($B=="")return
array("Statement"=>"BEGIN\n\t;\nEND");$u='(?:[^`"\s]+|`[^`]*`|"[^"]*")+';$vg=trigger_options();preg_match("~^CREATE\\s+TRIGGER\\s*$u\\s*(".implode("|",$vg["Timing"]).")\\s+([a-z]+)(?:\\s+OF\\s+($u))?\\s+ON\\s*$u\\s*(?:FOR\\s+EACH\\s+ROW\\s)?(.*)~is",$h->result("SELECT sql FROM sqlite_master WHERE type = 'trigger' AND name = ".q($B)),$A);$ee=$A[3];return
array("Timing"=>strtoupper($A[1]),"Event"=>strtoupper($A[2]).($ee?" OF":""),"Of"=>($ee[0]=='`'||$ee[0]=='"'?idf_unescape($ee):$ee),"Trigger"=>$B,"Statement"=>$A[4],);}function
triggers($R){$J=array();$vg=trigger_options();foreach(get_rows("SELECT * FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R))as$K){preg_match('~^CREATE\s+TRIGGER\s*(?:[^`"\s]+|`[^`]*`|"[^"]*")+\s*('.implode("|",$vg["Timing"]).')\s*(.*)\s+ON\b~iU',$K["sql"],$A);$J[$K["name"]]=array($A[1],$A[2]);}return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","UPDATE OF","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
begin(){return
queries("BEGIN");}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ROWID()");}function
explain($h,$G){return$h->query("EXPLAIN QUERY PLAN $G");}function
found_rows($S,$Z){}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($mf){return
true;}function
create_sql($R,$Ea,$Pf){global$h;$J=$h->result("SELECT sql FROM sqlite_master WHERE type IN ('table', 'view') AND name = ".q($R));foreach(indexes($R)as$B=>$v){if($B=='')continue;$J.=";\n\n".index_sql($R,$v['type'],$B,"(".implode(", ",array_map('idf_escape',$v['columns'])).")");}return$J;}function
truncate_sql($R){return"DELETE FROM ".table($R);}function
use_sql($k){}function
trigger_sql($R){return
implode(get_vals("SELECT sql || ';;\n' FROM sqlite_master WHERE type = 'trigger' AND tbl_name = ".q($R)));}function
show_variables(){global$h;$J=array();foreach(array("auto_vacuum","cache_size","count_changes","default_cache_size","empty_result_callbacks","encoding","foreign_keys","full_column_names","fullfsync","journal_mode","journal_size_limit","legacy_file_format","locking_mode","page_size","max_page_count","read_uncommitted","recursive_triggers","reverse_unordered_selects","secure_delete","short_column_names","synchronous","temp_store","temp_store_directory","schema_version","integrity_check","quick_check")as$y)$J[$y]=$h->result("PRAGMA $y");return$J;}function
show_status(){$J=array();foreach(get_vals("PRAGMA compile_options")as$ne){list($y,$X)=explode("=",$ne,2);$J[$y]=$X;}return$J;}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($hc){return
preg_match('~^(columns|database|drop_col|dump|indexes|descidx|move_col|sql|status|table|trigger|variables|view|view_trigger)$~',$hc);}$x="sqlite";$yg=array("integer"=>0,"real"=>0,"numeric"=>0,"text"=>0,"blob"=>0);$Of=array_keys($yg);$Eg=array();$me=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Cc=array("hex","length","lower","round","unixepoch","upper");$Gc=array("avg","count","count distinct","group_concat","max","min","sum");$Kb=array(array(),array("integer|real|numeric"=>"+/-","text"=>"||",));}$Fb["pgsql"]="PostgreSQL";if(isset($_GET["pgsql"])){$Ge=array("PgSQL","PDO_PgSQL");define("DRIVER","pgsql");if(extension_loaded("pgsql")){class
Min_DB{var$extension="PgSQL",$_link,$_result,$_string,$_database=true,$server_info,$affected_rows,$error,$timeout;function
_error($Ub,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$F){global$b;$m=$b->database();set_error_handler(array($this,'_error'));$this->_string="host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' user='".addcslashes($V,"'\\")."' password='".addcslashes($F,"'\\")."'";$this->_link=@pg_connect("$this->_string dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",PGSQL_CONNECT_FORCE_NEW);if(!$this->_link&&$m!=""){$this->_database=false;$this->_link=@pg_connect("$this->_string dbname='postgres'",PGSQL_CONNECT_FORCE_NEW);}restore_error_handler();if($this->_link){$Og=pg_version($this->_link);$this->server_info=$Og["server"];pg_set_client_encoding($this->_link,"UTF8");}return(bool)$this->_link;}function
quote($Q){return"'".pg_escape_string($this->_link,$Q)."'";}function
value($X,$p){return($p["type"]=="bytea"?pg_unescape_bytea($X):$X);}function
quoteBinary($Q){return"'".pg_escape_bytea($this->_link,$Q)."'";}function
select_db($k){global$b;if($k==$b->database())return$this->_database;$J=@pg_connect("$this->_string dbname='".addcslashes($k,"'\\")."'",PGSQL_CONNECT_FORCE_NEW);if($J)$this->_link=$J;return$J;}function
close(){$this->_link=@pg_connect("$this->_string dbname='postgres'");}function
query($G,$zg=false){$I=@pg_query($this->_link,$G);$this->error="";if(!$I){$this->error=pg_last_error($this->_link);$J=false;}elseif(!pg_num_fields($I)){$this->affected_rows=pg_affected_rows($I);$J=true;}else$J=new
Min_Result($I);if($this->timeout){$this->timeout=0;$this->query("RESET statement_timeout");}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
pg_fetch_result($I->_result,0,$p);}function
warnings(){return
h(pg_last_notice($this->_link));}}class
Min_Result{var$_result,$_offset=0,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=pg_num_rows($I);}function
fetch_assoc(){return
pg_fetch_assoc($this->_result);}function
fetch_row(){return
pg_fetch_row($this->_result);}function
fetch_field(){$f=$this->_offset++;$J=new
stdClass;if(function_exists('pg_field_table'))$J->orgtable=pg_field_table($this->_result,$f);$J->name=pg_field_name($this->_result,$f);$J->orgname=$J->name;$J->type=pg_field_type($this->_result,$f);$J->charsetnr=($J->type=="bytea"?63:0);return$J;}function
__destruct(){pg_free_result($this->_result);}}}elseif(extension_loaded("pdo_pgsql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_PgSQL",$timeout;function
connect($O,$V,$F){global$b;$m=$b->database();$Q="pgsql:host='".str_replace(":","' port='",addcslashes($O,"'\\"))."' options='-c client_encoding=utf8'";$this->dsn("$Q dbname='".($m!=""?addcslashes($m,"'\\"):"postgres")."'",$V,$F);return
true;}function
select_db($k){global$b;return($b->database()==$k);}function
quoteBinary($kf){return
q($kf);}function
query($G,$zg=false){$J=parent::query($G,$zg);if($this->timeout){$this->timeout=0;parent::query("RESET statement_timeout");}return$J;}function
warnings(){return'';}function
close(){}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Ie){global$h;foreach($L
as$P){$Fg=array();$Z=array();foreach($P
as$y=>$X){$Fg[]="$y = $X";if(isset($Ie[idf_unescape($y)]))$Z[]="$y = $X";}if(!(($Z&&queries("UPDATE ".table($R)." SET ".implode(", ",$Fg)." WHERE ".implode(" AND ",$Z))&&$h->affected_rows)||queries("INSERT INTO ".table($R)." (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).")")))return
false;}return
true;}function
slowQuery($G,$eg){$this->_conn->query("SET statement_timeout = ".(1000*$eg));$this->_conn->timeout=1000*$eg;return$G;}function
convertSearch($u,$X,$p){return(preg_match('~char|text'.(!preg_match('~LIKE~',$X["op"])?'|date|time(stamp)?|boolean|uuid|'.number_type():'').'~',$p["type"])?$u:"CAST($u AS text)");}function
quoteBinary($kf){return$this->_conn->quoteBinary($kf);}function
warnings(){return$this->_conn->warnings();}function
tableHelp($B){$Bd=array("information_schema"=>"infoschema","pg_catalog"=>"catalog",);$_=$Bd[$_GET["ns"]];if($_)return"$_-".str_replace("_","-",$B).".html";}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b,$yg,$Of;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){if(min_version(9,0,$h)){$h->query("SET application_name = 'Adminer'");if(min_version(9.2,0,$h)){$Of['Tekstowe'][]="json";$yg["json"]=4294967295;if(min_version(9.4,0,$h)){$Of['Tekstowe'][]="jsonb";$yg["jsonb"]=4294967295;}}}return$h;}return$h->error;}function
get_databases(){return
get_vals("SELECT datname FROM pg_database WHERE has_database_privilege(datname, 'CONNECT') ORDER BY datname");}function
limit($G,$Z,$z,$fe=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($fe?" OFFSET $fe":""):"");}function
limit1($R,$G,$Z,$N="\n"){return(preg_match('~^INTO~',$G)?limit($G,$Z,1,0,$N):" $G".(is_view(table_status1($R))?$Z:" WHERE ctid = (SELECT ctid FROM ".table($R).$Z.$N."LIMIT 1)"));}function
db_collation($m,$cb){global$h;return$h->result("SHOW LC_COLLATE");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT user");}function
tables_list(){$G="SELECT table_name, table_type FROM information_schema.tables WHERE table_schema = current_schema()";if(support('materializedview'))$G.="
UNION ALL
SELECT matviewname, 'MATERIALIZED VIEW'
FROM pg_matviews
WHERE schemaname = current_schema()";$G.="
ORDER BY 1";return
get_key_vals($G);}function
count_tables($l){return
array();}function
table_status($B=""){$J=array();foreach(get_rows("SELECT c.relname AS \"Name\", CASE c.relkind WHEN 'r' THEN 'table' WHEN 'm' THEN 'materialized view' ELSE 'view' END AS \"Engine\", pg_relation_size(c.oid) AS \"Data_length\", pg_total_relation_size(c.oid) - pg_relation_size(c.oid) AS \"Index_length\", obj_description(c.oid, 'pg_class') AS \"Comment\", CASE WHEN c.relhasoids THEN 'oid' ELSE '' END AS \"Oid\", c.reltuples as \"Rows\", n.nspname
FROM pg_class c
JOIN pg_namespace n ON(n.nspname = current_schema() AND n.oid = c.relnamespace)
WHERE relkind IN ('r', 'm', 'v', 'f')
".($B!=""?"AND relname = ".q($B):"ORDER BY relname"))as$K)$J[$K["Name"]]=$K;return($B!=""?$J[$B]:$J);}function
is_view($S){return
in_array($S["Engine"],array("view","materialized view"));}function
fk_support($S){return
true;}function
fields($R){$J=array();$wa=array('timestamp without time zone'=>'timestamp','timestamp with time zone'=>'timestamptz',);$Tc=min_version(10)?"(a.attidentity = 'd')::int":'0';foreach(get_rows("SELECT a.attname AS field, format_type(a.atttypid, a.atttypmod) AS full_type, d.adsrc AS default, a.attnotnull::int, col_description(c.oid, a.attnum) AS comment, $Tc AS identity
FROM pg_class c
JOIN pg_namespace n ON c.relnamespace = n.oid
JOIN pg_attribute a ON c.oid = a.attrelid
LEFT JOIN pg_attrdef d ON c.oid = d.adrelid AND a.attnum = d.adnum
WHERE c.relname = ".q($R)."
AND n.nspname = current_schema()
AND NOT a.attisdropped
AND a.attnum > 0
ORDER BY a.attnum")as$K){preg_match('~([^([]+)(\((.*)\))?([a-z ]+)?((\[[0-9]*])*)$~',$K["full_type"],$A);list(,$U,$zd,$K["length"],$ra,$ya)=$A;$K["length"].=$ya;$Ua=$U.$ra;if(isset($wa[$Ua])){$K["type"]=$wa[$Ua];$K["full_type"]=$K["type"].$zd.$ya;}else{$K["type"]=$U;$K["full_type"]=$K["type"].$zd.$ra.$ya;}if($K['identity'])$K['default']='GENERATED BY DEFAULT AS IDENTITY';$K["null"]=!$K["attnotnull"];$K["auto_increment"]=$K['identity']||preg_match('~^nextval\(~i',$K["default"]);$K["privileges"]=array("insert"=>1,"select"=>1,"update"=>1);if(preg_match('~(.+)::[^)]+(.*)~',$K["default"],$A))$K["default"]=($A[1]=="NULL"?null:(($A[1][0]=="'"?idf_unescape($A[1]):$A[1]).$A[2]));$J[$K["field"]]=$K;}return$J;}function
indexes($R,$i=null){global$h;if(!is_object($i))$i=$h;$J=array();$Wf=$i->result("SELECT oid FROM pg_class WHERE relnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema()) AND relname = ".q($R));$g=get_key_vals("SELECT attnum, attname FROM pg_attribute WHERE attrelid = $Wf AND attnum > 0",$i);foreach(get_rows("SELECT relname, indisunique::int, indisprimary::int, indkey, indoption , (indpred IS NOT NULL)::int as indispartial FROM pg_index i, pg_class ci WHERE i.indrelid = $Wf AND ci.oid = i.indexrelid",$i)as$K){$Ye=$K["relname"];$J[$Ye]["type"]=($K["indispartial"]?"INDEX":($K["indisprimary"]?"PRIMARY":($K["indisunique"]?"UNIQUE":"INDEX")));$J[$Ye]["columns"]=array();foreach(explode(" ",$K["indkey"])as$bd)$J[$Ye]["columns"][]=$g[$bd];$J[$Ye]["descs"]=array();foreach(explode(" ",$K["indoption"])as$cd)$J[$Ye]["descs"][]=($cd&1?'1':null);$J[$Ye]["lengths"]=array();}return$J;}function
foreign_keys($R){global$he;$J=array();foreach(get_rows("SELECT conname, condeferrable::int AS deferrable, pg_get_constraintdef(oid) AS definition
FROM pg_constraint
WHERE conrelid = (SELECT pc.oid FROM pg_class AS pc INNER JOIN pg_namespace AS pn ON (pn.oid = pc.relnamespace) WHERE pc.relname = ".q($R)." AND pn.nspname = current_schema())
AND contype = 'f'::char
ORDER BY conkey, conname")as$K){if(preg_match('~FOREIGN KEY\s*\((.+)\)\s*REFERENCES (.+)\((.+)\)(.*)$~iA',$K['definition'],$A)){$K['source']=array_map('trim',explode(',',$A[1]));if(preg_match('~^(("([^"]|"")+"|[^"]+)\.)?"?("([^"]|"")+"|[^"]+)$~',$A[2],$Id)){$K['ns']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Id[2]));$K['table']=str_replace('""','"',preg_replace('~^"(.+)"$~','\1',$Id[4]));}$K['target']=array_map('trim',explode(',',$A[3]));$K['on_delete']=(preg_match("~ON DELETE ($he)~",$A[4],$Id)?$Id[1]:'NO ACTION');$K['on_update']=(preg_match("~ON UPDATE ($he)~",$A[4],$Id)?$Id[1]:'NO ACTION');$J[$K['conname']]=$K;}}return$J;}function
view($B){global$h;return
array("select"=>trim($h->result("SELECT view_definition
FROM information_schema.views
WHERE table_schema = current_schema() AND table_name = ".q($B))));}function
collations(){return
array();}function
information_schema($m){return($m=="information_schema");}function
error(){global$h;$J=h($h->error);if(preg_match('~^(.*\n)?([^\n]*)\n( *)\^(\n.*)?$~s',$J,$A))$J=$A[1].preg_replace('~((?:[^&]|&[^;]*;){'.strlen($A[3]).'})(.*)~','\1<b>\2</b>',$A[2]).$A[4];return
nl_br($J);}function
create_database($m,$e){return
queries("CREATE DATABASE ".idf_escape($m).($e?" ENCODING ".idf_escape($e):""));}function
drop_databases($l){global$h;$h->close();return
apply_queries("DROP DATABASE",$l,'idf_escape');}function
rename_database($B,$e){return
queries("ALTER DATABASE ".idf_escape(DB)." RENAME TO ".idf_escape($B));}function
auto_increment(){return"";}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){$c=array();$Qe=array();foreach($q
as$p){$f=idf_escape($p[0]);$X=$p[1];if(!$X)$c[]="DROP $f";else{$Lg=$X[5];unset($X[5]);if(isset($X[6])&&$p[0]=="")$X[1]=($X[1]=="bigint"?" big":" ")."serial";if($p[0]=="")$c[]=($R!=""?"ADD ":"  ").implode($X);else{if($f!=$X[0])$Qe[]="ALTER TABLE ".table($R)." RENAME $f TO $X[0]";$c[]="ALTER $f TYPE$X[1]";if(!$X[6]){$c[]="ALTER $f ".($X[3]?"SET$X[3]":"DROP DEFAULT");$c[]="ALTER $f ".($X[2]==" NULL"?"DROP NOT":"SET").$X[2];}}if($p[0]!=""||$Lg!="")$Qe[]="COMMENT ON COLUMN ".table($R).".$X[0] IS ".($Lg!=""?substr($Lg,9):"''");}}$c=array_merge($c,$tc);if($R=="")array_unshift($Qe,"CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");elseif($c)array_unshift($Qe,"ALTER TABLE ".table($R)."\n".implode(",\n",$c));if($R!=""&&$R!=$B)$Qe[]="ALTER TABLE ".table($R)." RENAME TO ".table($B);if($R!=""||$gb!="")$Qe[]="COMMENT ON TABLE ".table($B)." IS ".q($gb);if($Ea!=""){}foreach($Qe
as$G){if(!queries($G))return
false;}return
true;}function
alter_indexes($R,$c){$ob=array();$Gb=array();$Qe=array();foreach($c
as$X){if($X[0]!="INDEX")$ob[]=($X[2]=="DROP"?"\nDROP CONSTRAINT ".idf_escape($X[1]):"\nADD".($X[1]!=""?" CONSTRAINT ".idf_escape($X[1]):"")." $X[0] ".($X[0]=="PRIMARY"?"KEY ":"")."(".implode(", ",$X[2]).")");elseif($X[2]=="DROP")$Gb[]=idf_escape($X[1]);else$Qe[]="CREATE INDEX ".idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R)." (".implode(", ",$X[2]).")";}if($ob)array_unshift($Qe,"ALTER TABLE ".table($R).implode(",",$ob));if($Gb)array_unshift($Qe,"DROP INDEX ".implode(", ",$Gb));foreach($Qe
as$G){if(!queries($G))return
false;}return
true;}function
truncate_tables($T){return
queries("TRUNCATE ".implode(", ",array_map('table',$T)));return
true;}function
drop_views($Qg){return
drop_tables($Qg);}function
drop_tables($T){foreach($T
as$R){$Mf=table_status($R);if(!queries("DROP ".strtoupper($Mf["Engine"])." ".table($R)))return
false;}return
true;}function
move_tables($T,$Qg,$Yf){foreach(array_merge($T,$Qg)as$R){$Mf=table_status($R);if(!queries("ALTER ".strtoupper($Mf["Engine"])." ".table($R)." SET SCHEMA ".idf_escape($Yf)))return
false;}return
true;}function
trigger($B,$R=null){if($B=="")return
array("Statement"=>"EXECUTE PROCEDURE ()");if($R===null)$R=$_GET['trigger'];$L=get_rows('SELECT t.trigger_name AS "Trigger", t.action_timing AS "Timing", (SELECT STRING_AGG(event_manipulation, \' OR \') FROM information_schema.triggers WHERE event_object_table = t.event_object_table AND trigger_name = t.trigger_name ) AS "Events", t.event_manipulation AS "Event", \'FOR EACH \' || t.action_orientation AS "Type", t.action_statement AS "Statement" FROM information_schema.triggers t WHERE t.event_object_table = '.q($R).' AND t.trigger_name = '.q($B));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SELECT * FROM information_schema.triggers WHERE event_object_table = ".q($R))as$K)$J[$K["trigger_name"]]=array($K["action_timing"],$K["event_manipulation"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW","FOR EACH STATEMENT"),);}function
routine($B,$U){$L=get_rows('SELECT routine_definition AS definition, LOWER(external_language) AS language, *
FROM information_schema.routines
WHERE routine_schema = current_schema() AND specific_name = '.q($B));$J=$L[0];$J["returns"]=array("type"=>$J["type_udt_name"]);$J["fields"]=get_rows('SELECT parameter_name AS field, data_type AS type, character_maximum_length AS length, parameter_mode AS inout
FROM information_schema.parameters
WHERE specific_schema = current_schema() AND specific_name = '.q($B).'
ORDER BY ordinal_position');return$J;}function
routines(){return
get_rows('SELECT specific_name AS "SPECIFIC_NAME", routine_type AS "ROUTINE_TYPE", routine_name AS "ROUTINE_NAME", type_udt_name AS "DTD_IDENTIFIER"
FROM information_schema.routines
WHERE routine_schema = current_schema()
ORDER BY SPECIFIC_NAME');}function
routine_languages(){return
get_vals("SELECT LOWER(lanname) FROM pg_catalog.pg_language");}function
routine_id($B,$K){$J=array();foreach($K["fields"]as$p)$J[]=$p["type"];return
idf_escape($B)."(".implode(", ",$J).")";}function
last_id(){return
0;}function
explain($h,$G){return$h->query("EXPLAIN $G");}function
found_rows($S,$Z){global$h;if(preg_match("~ rows=([0-9]+)~",$h->result("EXPLAIN SELECT * FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):"")),$Xe))return$Xe[1];return
false;}function
types(){return
get_vals("SELECT typname
FROM pg_type
WHERE typnamespace = (SELECT oid FROM pg_namespace WHERE nspname = current_schema())
AND typtype IN ('b','d','e')
AND typelem = 0");}function
schemas(){return
get_vals("SELECT nspname FROM pg_namespace ORDER BY nspname");}function
get_schema(){global$h;return$h->result("SELECT current_schema()");}function
set_schema($lf){global$h,$yg,$Of;$J=$h->query("SET search_path TO ".idf_escape($lf));foreach(types()as$U){if(!isset($yg[$U])){$yg[$U]=0;$Of['Typy uÅ¼ytkownika'][]=$U;}}return$J;}function
create_sql($R,$Ea,$Pf){global$h;$J='';$hf=array();$vf=array();$Mf=table_status($R);$q=fields($R);$w=indexes($R);ksort($w);$qc=foreign_keys($R);ksort($qc);if(!$Mf||empty($q))return
false;$J="CREATE TABLE ".idf_escape($Mf['nspname']).".".idf_escape($Mf['Name'])." (\n    ";foreach($q
as$ic=>$p){$ye=idf_escape($p['field']).' '.$p['full_type'].default_value($p).($p['attnotnull']?" NOT NULL":"");$hf[]=$ye;if(preg_match('~nextval\(\'([^\']+)\'\)~',$p['default'],$Jd)){$uf=$Jd[1];$Gf=reset(get_rows(min_version(10)?"SELECT *, cache_size AS cache_value FROM pg_sequences WHERE schemaname = current_schema() AND sequencename = ".q($uf):"SELECT * FROM $uf"));$vf[]=($Pf=="DROP+CREATE"?"DROP SEQUENCE IF EXISTS $uf;\n":"")."CREATE SEQUENCE $uf INCREMENT $Gf[increment_by] MINVALUE $Gf[min_value] MAXVALUE $Gf[max_value] START ".($Ea?$Gf['last_value']:1)." CACHE $Gf[cache_value];";}}if(!empty($vf))$J=implode("\n\n",$vf)."\n\n$J";foreach($w
as$Wc=>$v){switch($v['type']){case'UNIQUE':$hf[]="CONSTRAINT ".idf_escape($Wc)." UNIQUE (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;case'PRIMARY':$hf[]="CONSTRAINT ".idf_escape($Wc)." PRIMARY KEY (".implode(', ',array_map('idf_escape',$v['columns'])).")";break;}}foreach($qc
as$pc=>$oc)$hf[]="CONSTRAINT ".idf_escape($pc)." $oc[definition] ".($oc['deferrable']?'DEFERRABLE':'NOT DEFERRABLE');$J.=implode(",\n    ",$hf)."\n) WITH (oids = ".($Mf['Oid']?'true':'false').");";foreach($w
as$Wc=>$v){if($v['type']=='INDEX'){$g=array();foreach($v['columns']as$y=>$X)$g[]=idf_escape($X).($v['descs'][$y]?" DESC":"");$J.="\n\nCREATE INDEX ".idf_escape($Wc)." ON ".idf_escape($Mf['nspname']).".".idf_escape($Mf['Name'])." USING btree (".implode(', ',$g).");";}}if($Mf['Comment'])$J.="\n\nCOMMENT ON TABLE ".idf_escape($Mf['nspname']).".".idf_escape($Mf['Name'])." IS ".q($Mf['Comment']).";";foreach($q
as$ic=>$p){if($p['comment'])$J.="\n\nCOMMENT ON COLUMN ".idf_escape($Mf['nspname']).".".idf_escape($Mf['Name']).".".idf_escape($ic)." IS ".q($p['comment']).";";}return
rtrim($J,';');}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
trigger_sql($R){$Mf=table_status($R);$J="";foreach(triggers($R)as$sg=>$rg){$tg=trigger($sg,$Mf['Name']);$J.="\nCREATE TRIGGER ".idf_escape($tg['Trigger'])." $tg[Timing] $tg[Events] ON ".idf_escape($Mf["nspname"]).".".idf_escape($Mf['Name'])." $tg[Type] $tg[Statement];;\n";}return$J;}function
use_sql($k){return"\connect ".idf_escape($k);}function
show_variables(){return
get_key_vals("SHOW ALL");}function
process_list(){return
get_rows("SELECT * FROM pg_stat_activity ORDER BY ".(min_version(9.2)?"pid":"procpid"));}function
show_status(){}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($hc){return
preg_match('~^(database|table|columns|sql|indexes|descidx|comment|view|'.(min_version(9.3)?'materializedview|':'').'scheme|routine|processlist|sequence|trigger|type|variables|drop_col|kill|dump)$~',$hc);}function
kill_process($X){return
queries("SELECT pg_terminate_backend(".number($X).")");}function
connection_id(){return"SELECT pg_backend_pid()";}function
max_connections(){global$h;return$h->result("SHOW max_connections");}$x="pgsql";$yg=array();$Of=array();foreach(array('Numeryczne'=>array("smallint"=>5,"integer"=>10,"bigint"=>19,"boolean"=>1,"numeric"=>0,"real"=>7,"double precision"=>16,"money"=>20),'Data i czas'=>array("date"=>13,"time"=>17,"timestamp"=>20,"timestamptz"=>21,"interval"=>0),'Tekstowe'=>array("character"=>0,"character varying"=>0,"text"=>0,"tsquery"=>0,"tsvector"=>0,"uuid"=>0,"xml"=>0),'Binarne'=>array("bit"=>0,"bit varying"=>0,"bytea"=>0),'SieÄ‡'=>array("cidr"=>43,"inet"=>43,"macaddr"=>17,"txid_snapshot"=>0),'Geometria'=>array("box"=>0,"circle"=>0,"line"=>0,"lseg"=>0,"path"=>0,"point"=>0,"polygon"=>0),)as$y=>$X){$yg+=$X;$Of[$y]=array_keys($X);}$Eg=array();$me=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","ILIKE","ILIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Cc=array("char_length","lower","round","to_hex","to_timestamp","upper");$Gc=array("avg","count","count distinct","max","min","sum");$Kb=array(array("char"=>"md5","date|time"=>"now",),array(number_type()=>"+/-","date|time"=>"+ interval/- interval","char|text"=>"||",));}$Fb["oracle"]="Oracle (beta)";if(isset($_GET["oracle"])){$Ge=array("OCI8","PDO_OCI");define("DRIVER","oracle");if(extension_loaded("oci8")){class
Min_DB{var$extension="oci8",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_error($Ub,$o){if(ini_bool("html_errors"))$o=html_entity_decode(strip_tags($o));$o=preg_replace('~^[^:]*: ~','',$o);$this->error=$o;}function
connect($O,$V,$F){$this->_link=@oci_new_connect($V,$F,$O,"AL32UTF8");if($this->_link){$this->server_info=oci_server_version($this->_link);return
true;}$o=oci_error();$this->error=$o["message"];return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
true;}function
query($G,$zg=false){$I=oci_parse($this->_link,$G);$this->error="";if(!$I){$o=oci_error($this->_link);$this->errno=$o["code"];$this->error=$o["message"];return
false;}set_error_handler(array($this,'_error'));$J=@oci_execute($I);restore_error_handler();if($J){if(oci_num_fields($I))return
new
Min_Result($I);$this->affected_rows=oci_num_rows($I);}return$J;}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=1){$I=$this->query($G);if(!is_object($I)||!oci_fetch($I->_result))return
false;return
oci_result($I->_result,$p);}}class
Min_Result{var$_result,$_offset=1,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$y=>$X){if(is_a($X,'OCI-Lob'))$K[$y]=$X->load();}return$K;}function
fetch_assoc(){return$this->_convert(oci_fetch_assoc($this->_result));}function
fetch_row(){return$this->_convert(oci_fetch_row($this->_result));}function
fetch_field(){$f=$this->_offset++;$J=new
stdClass;$J->name=oci_field_name($this->_result,$f);$J->orgname=$J->name;$J->type=oci_field_type($this->_result,$f);$J->charsetnr=(preg_match("~raw|blob|bfile~",$J->type)?63:0);return$J;}function
__destruct(){oci_free_statement($this->_result);}}}elseif(extension_loaded("pdo_oci")){class
Min_DB
extends
Min_PDO{var$extension="PDO_OCI";function
connect($O,$V,$F){$this->dsn("oci:dbname=//$O;charset=AL32UTF8",$V,$F);return
true;}function
select_db($k){return
true;}}}class
Min_Driver
extends
Min_SQL{function
begin(){return
true;}}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT tablespace_name FROM user_tablespaces");}function
limit($G,$Z,$z,$fe=0,$N=" "){return($fe?" * FROM (SELECT t.*, rownum AS rnum FROM (SELECT $G$Z) t WHERE rownum <= ".($z+$fe).") WHERE rnum > $fe":($z!==null?" * FROM (SELECT $G$Z) WHERE rownum <= ".($z+$fe):" $G$Z"));}function
limit1($R,$G,$Z,$N="\n"){return" $G$Z";}function
db_collation($m,$cb){global$h;return$h->result("SELECT value FROM nls_database_parameters WHERE parameter = 'NLS_CHARACTERSET'");}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT USER FROM DUAL");}function
tables_list(){return
get_key_vals("SELECT table_name, 'table' FROM all_tables WHERE tablespace_name = ".q(DB)."
UNION SELECT view_name, 'view' FROM user_views
ORDER BY 1");}function
count_tables($l){return
array();}function
table_status($B=""){$J=array();$nf=q($B);foreach(get_rows('SELECT table_name "Name", \'table\' "Engine", avg_row_len * num_rows "Data_length", num_rows "Rows" FROM all_tables WHERE tablespace_name = '.q(DB).($B!=""?" AND table_name = $nf":"")."
UNION SELECT view_name, 'view', 0, 0 FROM user_views".($B!=""?" WHERE view_name = $nf":"")."
ORDER BY 1")as$K){if($B!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="view";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT * FROM all_tab_columns WHERE table_name = ".q($R)." ORDER BY column_id")as$K){$U=$K["DATA_TYPE"];$zd="$K[DATA_PRECISION],$K[DATA_SCALE]";if($zd==",")$zd=$K["DATA_LENGTH"];$J[$K["COLUMN_NAME"]]=array("field"=>$K["COLUMN_NAME"],"full_type"=>$U.($zd?"($zd)":""),"type"=>strtolower($U),"length"=>$zd,"default"=>$K["DATA_DEFAULT"],"null"=>($K["NULLABLE"]=="Y"),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SELECT uic.*, uc.constraint_type
FROM user_ind_columns uic
LEFT JOIN user_constraints uc ON uic.index_name = uc.constraint_name AND uic.table_name = uc.table_name
WHERE uic.table_name = ".q($R)."
ORDER BY uc.constraint_type, uic.column_position",$i)as$K){$Wc=$K["INDEX_NAME"];$J[$Wc]["type"]=($K["CONSTRAINT_TYPE"]=="P"?"PRIMARY":($K["CONSTRAINT_TYPE"]=="U"?"UNIQUE":"INDEX"));$J[$Wc]["columns"][]=$K["COLUMN_NAME"];$J[$Wc]["lengths"][]=($K["CHAR_LENGTH"]&&$K["CHAR_LENGTH"]!=$K["COLUMN_LENGTH"]?$K["CHAR_LENGTH"]:null);$J[$Wc]["descs"][]=($K["DESCEND"]?'1':null);}return$J;}function
view($B){$L=get_rows('SELECT text "select" FROM user_views WHERE view_name = '.q($B));return
reset($L);}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
explain($h,$G){$h->query("EXPLAIN PLAN FOR $G");return$h->query("SELECT * FROM plan_table");}function
found_rows($S,$Z){}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){$c=$Gb=array();foreach($q
as$p){$X=$p[1];if($X&&$p[0]!=""&&idf_escape($p[0])!=$X[0])queries("ALTER TABLE ".table($R)." RENAME COLUMN ".idf_escape($p[0])." TO $X[0]");if($X)$c[]=($R!=""?($p[0]!=""?"MODIFY (":"ADD ("):"  ").implode($X).($R!=""?")":"");else$Gb[]=idf_escape($p[0]);}if($R=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)");return(!$c||queries("ALTER TABLE ".table($R)."\n".implode("\n",$c)))&&(!$Gb||queries("ALTER TABLE ".table($R)." DROP (".implode(", ",$Gb).")"))&&($R==$B||queries("ALTER TABLE ".table($R)." RENAME TO ".table($B)));}function
foreign_keys($R){$J=array();$G="SELECT c_list.CONSTRAINT_NAME as NAME,
c_src.COLUMN_NAME as SRC_COLUMN,
c_dest.OWNER as DEST_DB,
c_dest.TABLE_NAME as DEST_TABLE,
c_dest.COLUMN_NAME as DEST_COLUMN,
c_list.DELETE_RULE as ON_DELETE
FROM ALL_CONSTRAINTS c_list, ALL_CONS_COLUMNS c_src, ALL_CONS_COLUMNS c_dest
WHERE c_list.CONSTRAINT_NAME = c_src.CONSTRAINT_NAME
AND c_list.R_CONSTRAINT_NAME = c_dest.CONSTRAINT_NAME
AND c_list.CONSTRAINT_TYPE = 'R'
AND c_src.TABLE_NAME = ".q($R);foreach(get_rows($G)as$K)$J[$K['NAME']]=array("db"=>$K['DEST_DB'],"table"=>$K['DEST_TABLE'],"source"=>array($K['SRC_COLUMN']),"target"=>array($K['DEST_COLUMN']),"on_delete"=>$K['ON_DELETE'],"on_update"=>null,);return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qg){return
apply_queries("DROP VIEW",$Qg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
last_id(){return
0;}function
schemas(){return
get_vals("SELECT DISTINCT owner FROM dba_segments WHERE owner IN (SELECT username FROM dba_users WHERE default_tablespace NOT IN ('SYSTEM','SYSAUX'))");}function
get_schema(){global$h;return$h->result("SELECT sys_context('USERENV', 'SESSION_USER') FROM dual");}function
set_schema($mf){global$h;return$h->query("ALTER SESSION SET CURRENT_SCHEMA = ".idf_escape($mf));}function
show_variables(){return
get_key_vals('SELECT name, display_value FROM v$parameter');}function
process_list(){return
get_rows('SELECT sess.process AS "process", sess.username AS "user", sess.schemaname AS "schema", sess.status AS "status", sess.wait_class AS "wait_class", sess.seconds_in_wait AS "seconds_in_wait", sql.sql_text AS "sql_text", sess.machine AS "machine", sess.port AS "port"
FROM v$session sess LEFT OUTER JOIN v$sql sql
ON sql.sql_id = sess.sql_id
WHERE sess.type = \'USER\'
ORDER BY PROCESS
');}function
show_status(){$L=get_rows('SELECT * FROM v$instance');return
reset($L);}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($hc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|processlist|scheme|sql|status|table|variables|view|view_trigger)$~',$hc);}$x="oracle";$yg=array();$Of=array();foreach(array('Numeryczne'=>array("number"=>38,"binary_float"=>12,"binary_double"=>21),'Data i czas'=>array("date"=>10,"timestamp"=>29,"interval year"=>12,"interval day"=>28),'Tekstowe'=>array("char"=>2000,"varchar2"=>4000,"nchar"=>2000,"nvarchar2"=>4000,"clob"=>4294967295,"nclob"=>4294967295),'Binarne'=>array("raw"=>2000,"long raw"=>2147483648,"blob"=>4294967295,"bfile"=>4294967296),)as$y=>$X){$yg+=$X;$Of[$y]=array_keys($X);}$Eg=array();$me=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Cc=array("length","lower","round","upper");$Gc=array("avg","count","count distinct","max","min","sum");$Kb=array(array("date"=>"current_date","timestamp"=>"current_timestamp",),array("number|float|double"=>"+/-","date|timestamp"=>"+ interval/- interval","char|clob"=>"||",));}$Fb["mssql"]="MS SQL (beta)";if(isset($_GET["mssql"])){$Ge=array("SQLSRV","MSSQL","PDO_DBLIB");define("DRIVER","mssql");if(extension_loaded("sqlsrv")){class
Min_DB{var$extension="sqlsrv",$_link,$_result,$server_info,$affected_rows,$errno,$error;function
_get_error(){$this->error="";foreach(sqlsrv_errors()as$o){$this->errno=$o["code"];$this->error.="$o[message]\n";}$this->error=rtrim($this->error);}function
connect($O,$V,$F){global$b;$m=$b->database();$jb=array("UID"=>$V,"PWD"=>$F,"CharacterSet"=>"UTF-8");if($m!="")$jb["Database"]=$m;$this->_link=@sqlsrv_connect(preg_replace('~:~',',',$O),$jb);if($this->_link){$dd=sqlsrv_server_info($this->_link);$this->server_info=$dd['SQLServerVersion'];}else$this->_get_error();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($G,$zg=false){$I=sqlsrv_query($this->_link,$G);$this->error="";if(!$I){$this->_get_error();return
false;}return$this->store_result($I);}function
multi_query($G){$this->_result=sqlsrv_query($this->_link,$G);$this->error="";if(!$this->_result){$this->_get_error();return
false;}return
true;}function
store_result($I=null){if(!$I)$I=$this->_result;if(!$I)return
false;if(sqlsrv_field_metadata($I))return
new
Min_Result($I);$this->affected_rows=sqlsrv_rows_affected($I);return
true;}function
next_result(){return$this->_result?sqlsrv_next_result($this->_result):null;}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;$K=$I->fetch_row();return$K[$p];}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;}function
_convert($K){foreach((array)$K
as$y=>$X){if(is_a($X,'DateTime'))$K[$y]=$X->format("Y-m-d H:i:s");}return$K;}function
fetch_assoc(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_ASSOC));}function
fetch_row(){return$this->_convert(sqlsrv_fetch_array($this->_result,SQLSRV_FETCH_NUMERIC));}function
fetch_field(){if(!$this->_fields)$this->_fields=sqlsrv_field_metadata($this->_result);$p=$this->_fields[$this->_offset++];$J=new
stdClass;$J->name=$p["Name"];$J->orgname=$p["Name"];$J->type=($p["Type"]==1?254:0);return$J;}function
seek($fe){for($s=0;$s<$fe;$s++)sqlsrv_fetch($this->_result);}function
__destruct(){sqlsrv_free_stmt($this->_result);}}}elseif(extension_loaded("mssql")){class
Min_DB{var$extension="MSSQL",$_link,$_result,$server_info,$affected_rows,$error;function
connect($O,$V,$F){$this->_link=@mssql_connect($O,$V,$F);if($this->_link){$I=$this->query("SELECT SERVERPROPERTY('ProductLevel'), SERVERPROPERTY('Edition')");if($I){$K=$I->fetch_row();$this->server_info=$this->result("sp_server_info 2",2)." [$K[0]] $K[1]";}}else$this->error=mssql_get_last_message();return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return
mssql_select_db($k);}function
query($G,$zg=false){$I=@mssql_query($G,$this->_link);$this->error="";if(!$I){$this->error=mssql_get_last_message();return
false;}if($I===true){$this->affected_rows=mssql_rows_affected($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
mssql_next_result($this->_result->_result);}function
result($G,$p=0){$I=$this->query($G);if(!is_object($I))return
false;return
mssql_result($I->_result,0,$p);}}class
Min_Result{var$_result,$_offset=0,$_fields,$num_rows;function
__construct($I){$this->_result=$I;$this->num_rows=mssql_num_rows($I);}function
fetch_assoc(){return
mssql_fetch_assoc($this->_result);}function
fetch_row(){return
mssql_fetch_row($this->_result);}function
num_rows(){return
mssql_num_rows($this->_result);}function
fetch_field(){$J=mssql_fetch_field($this->_result);$J->orgtable=$J->table;$J->orgname=$J->name;return$J;}function
seek($fe){mssql_data_seek($this->_result,$fe);}function
__destruct(){mssql_free_result($this->_result);}}}elseif(extension_loaded("pdo_dblib")){class
Min_DB
extends
Min_PDO{var$extension="PDO_DBLIB";function
connect($O,$V,$F){$this->dsn("dblib:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F);return
true;}function
select_db($k){return$this->query("USE ".idf_escape($k));}}}class
Min_Driver
extends
Min_SQL{function
insertUpdate($R,$L,$Ie){foreach($L
as$P){$Fg=array();$Z=array();foreach($P
as$y=>$X){$Fg[]="$y = $X";if(isset($Ie[idf_unescape($y)]))$Z[]="$y = $X";}if(!queries("MERGE ".table($R)." USING (VALUES(".implode(", ",$P).")) AS source (c".implode(", c",range(1,count($P))).") ON ".implode(" AND ",$Z)." WHEN MATCHED THEN UPDATE SET ".implode(", ",$Fg)." WHEN NOT MATCHED THEN INSERT (".implode(", ",array_keys($P)).") VALUES (".implode(", ",$P).");"))return
false;}return
true;}function
begin(){return
queries("BEGIN TRANSACTION");}}function
idf_escape($u){return"[".str_replace("]","]]",$u)."]";}function
table($u){return($_GET["ns"]!=""?idf_escape($_GET["ns"]).".":"").idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases(){return
get_vals("SELECT name FROM sys.databases WHERE name NOT IN ('master', 'tempdb', 'model', 'msdb')");}function
limit($G,$Z,$z,$fe=0,$N=" "){return($z!==null?" TOP (".($z+$fe).")":"")." $G$Z";}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$cb){global$h;return$h->result("SELECT collation_name FROM sys.databases WHERE name = ".q($m));}function
engines(){return
array();}function
logged_user(){global$h;return$h->result("SELECT SUSER_NAME()");}function
tables_list(){return
get_key_vals("SELECT name, type_desc FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ORDER BY name");}function
count_tables($l){global$h;$J=array();foreach($l
as$m){$h->select_db($m);$J[$m]=$h->result("SELECT COUNT(*) FROM INFORMATION_SCHEMA.TABLES");}return$J;}function
table_status($B=""){$J=array();foreach(get_rows("SELECT name AS Name, type_desc AS Engine FROM sys.all_objects WHERE schema_id = SCHEMA_ID(".q(get_schema()).") AND type IN ('S', 'U', 'V') ".($B!=""?"AND name = ".q($B):"ORDER BY name"))as$K){if($B!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]=="VIEW";}function
fk_support($S){return
true;}function
fields($R){$J=array();foreach(get_rows("SELECT c.max_length, c.precision, c.scale, c.name, c.is_nullable, c.is_identity, c.collation_name, t.name type, CAST(d.definition as text) [default]
FROM sys.all_columns c
JOIN sys.all_objects o ON c.object_id = o.object_id
JOIN sys.types t ON c.user_type_id = t.user_type_id
LEFT JOIN sys.default_constraints d ON c.default_object_id = d.parent_column_id
WHERE o.schema_id = SCHEMA_ID(".q(get_schema()).") AND o.type IN ('S', 'U', 'V') AND o.name = ".q($R))as$K){$U=$K["type"];$zd=(preg_match("~char|binary~",$U)?$K["max_length"]:($U=="decimal"?"$K[precision],$K[scale]":""));$J[$K["name"]]=array("field"=>$K["name"],"full_type"=>$U.($zd?"($zd)":""),"type"=>$U,"length"=>$zd,"default"=>$K["default"],"null"=>$K["is_nullable"],"auto_increment"=>$K["is_identity"],"collation"=>$K["collation_name"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"primary"=>$K["is_identity"],);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SELECT i.name, key_ordinal, is_unique, is_primary_key, c.name AS column_name, is_descending_key
FROM sys.indexes i
INNER JOIN sys.index_columns ic ON i.object_id = ic.object_id AND i.index_id = ic.index_id
INNER JOIN sys.columns c ON ic.object_id = c.object_id AND ic.column_id = c.column_id
WHERE OBJECT_NAME(i.object_id) = ".q($R),$i)as$K){$B=$K["name"];$J[$B]["type"]=($K["is_primary_key"]?"PRIMARY":($K["is_unique"]?"UNIQUE":"INDEX"));$J[$B]["lengths"]=array();$J[$B]["columns"][$K["key_ordinal"]]=$K["column_name"];$J[$B]["descs"][$K["key_ordinal"]]=($K["is_descending_key"]?'1':null);}return$J;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^[]|\[[^]]*])*\s+AS\s+~isU','',$h->result("SELECT VIEW_DEFINITION FROM INFORMATION_SCHEMA.VIEWS WHERE TABLE_SCHEMA = SCHEMA_NAME() AND TABLE_NAME = ".q($B))));}function
collations(){$J=array();foreach(get_vals("SELECT name FROM fn_helpcollations()")as$e)$J[preg_replace('~_.*~','',$e)][]=$e;return$J;}function
information_schema($m){return
false;}function
error(){global$h;return
nl_br(h(preg_replace('~^(\[[^]]*])+~m','',$h->error)));}function
create_database($m,$e){return
queries("CREATE DATABASE ".idf_escape($m).(preg_match('~^[a-z0-9_]+$~i',$e)?" COLLATE $e":""));}function
drop_databases($l){return
queries("DROP DATABASE ".implode(", ",array_map('idf_escape',$l)));}function
rename_database($B,$e){if(preg_match('~^[a-z0-9_]+$~i',$e))queries("ALTER DATABASE ".idf_escape(DB)." COLLATE $e");queries("ALTER DATABASE ".idf_escape(DB)." MODIFY NAME = ".idf_escape($B));return
true;}function
auto_increment(){return" IDENTITY".($_POST["Auto_increment"]!=""?"(".number($_POST["Auto_increment"]).",1)":"")." PRIMARY KEY";}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){$c=array();foreach($q
as$p){$f=idf_escape($p[0]);$X=$p[1];if(!$X)$c["DROP"][]=" COLUMN $f";else{$X[1]=preg_replace("~( COLLATE )'(\\w+)'~",'\1\2',$X[1]);if($p[0]=="")$c["ADD"][]="\n  ".implode("",$X).($R==""?substr($tc[$X[0]],16+strlen($X[0])):"");else{unset($X[6]);if($f!=$X[0])queries("EXEC sp_rename ".q(table($R).".$f").", ".q(idf_unescape($X[0])).", 'COLUMN'");$c["ALTER COLUMN ".implode("",$X)][]="";}}}if($R=="")return
queries("CREATE TABLE ".table($B)." (".implode(",",(array)$c["ADD"])."\n)");if($R!=$B)queries("EXEC sp_rename ".q(table($R)).", ".q($B));if($tc)$c[""]=$tc;foreach($c
as$y=>$X){if(!queries("ALTER TABLE ".idf_escape($B)." $y".implode(",",$X)))return
false;}return
true;}function
alter_indexes($R,$c){$v=array();$Gb=array();foreach($c
as$X){if($X[2]=="DROP"){if($X[0]=="PRIMARY")$Gb[]=idf_escape($X[1]);else$v[]=idf_escape($X[1])." ON ".table($R);}elseif(!queries(($X[0]!="PRIMARY"?"CREATE $X[0] ".($X[0]!="INDEX"?"INDEX ":"").idf_escape($X[1]!=""?$X[1]:uniqid($R."_"))." ON ".table($R):"ALTER TABLE ".table($R)." ADD PRIMARY KEY")." (".implode(", ",$X[2]).")"))return
false;}return(!$v||queries("DROP INDEX ".implode(", ",$v)))&&(!$Gb||queries("ALTER TABLE ".table($R)." DROP ".implode(", ",$Gb)));}function
last_id(){global$h;return$h->result("SELECT SCOPE_IDENTITY()");}function
explain($h,$G){$h->query("SET SHOWPLAN_ALL ON");$J=$h->query($G);$h->query("SET SHOWPLAN_ALL OFF");return$J;}function
found_rows($S,$Z){}function
foreign_keys($R){$J=array();foreach(get_rows("EXEC sp_fkeys @fktable_name = ".q($R))as$K){$wc=&$J[$K["FK_NAME"]];$wc["table"]=$K["PKTABLE_NAME"];$wc["source"][]=$K["FKCOLUMN_NAME"];$wc["target"][]=$K["PKCOLUMN_NAME"];}return$J;}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Qg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Qg,$Yf){return
apply_queries("ALTER SCHEMA ".idf_escape($Yf)." TRANSFER",array_merge($T,$Qg));}function
trigger($B){if($B=="")return
array();$L=get_rows("SELECT s.name [Trigger],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(s.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(s.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(s.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing],
c.text
FROM sysobjects s
JOIN syscomments c ON s.id = c.id
WHERE s.xtype = 'TR' AND s.name = ".q($B));$J=reset($L);if($J)$J["Statement"]=preg_replace('~^.+\s+AS\s+~isU','',$J["text"]);return$J;}function
triggers($R){$J=array();foreach(get_rows("SELECT sys1.name,
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsertTrigger') = 1 THEN 'INSERT' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsUpdateTrigger') = 1 THEN 'UPDATE' WHEN OBJECTPROPERTY(sys1.id, 'ExecIsDeleteTrigger') = 1 THEN 'DELETE' END [Event],
CASE WHEN OBJECTPROPERTY(sys1.id, 'ExecIsInsteadOfTrigger') = 1 THEN 'INSTEAD OF' ELSE 'AFTER' END [Timing]
FROM sysobjects sys1
JOIN sysobjects sys2 ON sys1.parent_obj = sys2.id
WHERE sys1.xtype = 'TR' AND sys2.name = ".q($R))as$K)$J[$K["name"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("AFTER","INSTEAD OF"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("AS"),);}function
schemas(){return
get_vals("SELECT name FROM sys.schemas");}function
get_schema(){global$h;if($_GET["ns"]!="")return$_GET["ns"];return$h->result("SELECT SCHEMA_NAME()");}function
set_schema($lf){return
true;}function
use_sql($k){return"USE ".idf_escape($k);}function
show_variables(){return
array();}function
show_status(){return
array();}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
support($hc){return
preg_match('~^(columns|database|drop_col|indexes|descidx|scheme|sql|table|trigger|view|view_trigger)$~',$hc);}$x="mssql";$yg=array();$Of=array();foreach(array('Numeryczne'=>array("tinyint"=>3,"smallint"=>5,"int"=>10,"bigint"=>20,"bit"=>1,"decimal"=>0,"real"=>12,"float"=>53,"smallmoney"=>10,"money"=>20),'Data i czas'=>array("date"=>10,"smalldatetime"=>19,"datetime"=>19,"datetime2"=>19,"time"=>8,"datetimeoffset"=>10),'Tekstowe'=>array("char"=>8000,"varchar"=>8000,"text"=>2147483647,"nchar"=>4000,"nvarchar"=>4000,"ntext"=>1073741823),'Binarne'=>array("binary"=>8000,"varbinary"=>8000,"image"=>2147483647),)as$y=>$X){$yg+=$X;$Of[$y]=array_keys($X);}$Eg=array();$me=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL");$Cc=array("len","lower","round","upper");$Gc=array("avg","count","count distinct","max","min","sum");$Kb=array(array("date|time"=>"getdate",),array("int|decimal|real|float|money|datetime"=>"+/-","char|text"=>"+",));}$Fb['firebird']='Firebird (alpha)';if(isset($_GET["firebird"])){$Ge=array("interbase");define("DRIVER","firebird");if(extension_loaded("interbase")){class
Min_DB{var$extension="Firebird",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){$this->_link=ibase_connect($O,$V,$F);if($this->_link){$Ig=explode(':',$O);$this->service_link=ibase_service_attach($Ig[0],$V,$F);$this->server_info=ibase_server_info($this->service_link,IBASE_SVC_SERVER_VERSION);}else{$this->errno=ibase_errcode();$this->error=ibase_errmsg();}return(bool)$this->_link;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}function
select_db($k){return($k=="domain");}function
query($G,$zg=false){$I=ibase_query($G,$this->_link);if(!$I){$this->errno=ibase_errcode();$this->error=ibase_errmsg();return
false;}$this->error="";if($I===true){$this->affected_rows=ibase_affected_rows($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;$K=$I->fetch_row();return$K[$p];}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;}function
fetch_assoc(){return
ibase_fetch_assoc($this->_result);}function
fetch_row(){return
ibase_fetch_row($this->_result);}function
fetch_field(){$p=ibase_field_info($this->_result,$this->_offset++);return(object)array('name'=>$p['name'],'orgname'=>$p['name'],'type'=>$p['type'],'charsetnr'=>$p['length'],);}function
__destruct(){ibase_free_result($this->_result);}}}class
Min_Driver
extends
Min_SQL{}function
idf_escape($u){return'"'.str_replace('"','""',$u).'"';}function
table($u){return
idf_escape($u);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($rc){return
array("domain");}function
limit($G,$Z,$z,$fe=0,$N=" "){$J='';$J.=($z!==null?$N."FIRST $z".($fe?" SKIP $fe":""):"");$J.=" $G$Z";return$J;}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$cb){}function
engines(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){global$h;$G='SELECT RDB$RELATION_NAME FROM rdb$relations WHERE rdb$system_flag = 0';$I=ibase_query($h->_link,$G);$J=array();while($K=ibase_fetch_assoc($I))$J[$K['RDB$RELATION_NAME']]='table';ksort($J);return$J;}function
count_tables($l){return
array();}function
table_status($B="",$gc=false){global$h;$J=array();$tb=tables_list();foreach($tb
as$v=>$X){$v=trim($v);$J[$v]=array('Name'=>$v,'Engine'=>'standard',);if($B==$v)return$J[$v];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"]);}function
fields($R){global$h;$J=array();$G='SELECT r.RDB$FIELD_NAME AS field_name,
r.RDB$DESCRIPTION AS field_description,
r.RDB$DEFAULT_VALUE AS field_default_value,
r.RDB$NULL_FLAG AS field_not_null_constraint,
f.RDB$FIELD_LENGTH AS field_length,
f.RDB$FIELD_PRECISION AS field_precision,
f.RDB$FIELD_SCALE AS field_scale,
CASE f.RDB$FIELD_TYPE
WHEN 261 THEN \'BLOB\'
WHEN 14 THEN \'CHAR\'
WHEN 40 THEN \'CSTRING\'
WHEN 11 THEN \'D_FLOAT\'
WHEN 27 THEN \'DOUBLE\'
WHEN 10 THEN \'FLOAT\'
WHEN 16 THEN \'INT64\'
WHEN 8 THEN \'INTEGER\'
WHEN 9 THEN \'QUAD\'
WHEN 7 THEN \'SMALLINT\'
WHEN 12 THEN \'DATE\'
WHEN 13 THEN \'TIME\'
WHEN 35 THEN \'TIMESTAMP\'
WHEN 37 THEN \'VARCHAR\'
ELSE \'UNKNOWN\'
END AS field_type,
f.RDB$FIELD_SUB_TYPE AS field_subtype,
coll.RDB$COLLATION_NAME AS field_collation,
cset.RDB$CHARACTER_SET_NAME AS field_charset
FROM RDB$RELATION_FIELDS r
LEFT JOIN RDB$FIELDS f ON r.RDB$FIELD_SOURCE = f.RDB$FIELD_NAME
LEFT JOIN RDB$COLLATIONS coll ON f.RDB$COLLATION_ID = coll.RDB$COLLATION_ID
LEFT JOIN RDB$CHARACTER_SETS cset ON f.RDB$CHARACTER_SET_ID = cset.RDB$CHARACTER_SET_ID
WHERE r.RDB$RELATION_NAME = '.q($R).'
ORDER BY r.RDB$FIELD_POSITION';$I=ibase_query($h->_link,$G);while($K=ibase_fetch_assoc($I))$J[trim($K['FIELD_NAME'])]=array("field"=>trim($K["FIELD_NAME"]),"full_type"=>trim($K["FIELD_TYPE"]),"type"=>trim($K["FIELD_SUB_TYPE"]),"default"=>trim($K['FIELD_DEFAULT_VALUE']),"null"=>(trim($K["FIELD_NOT_NULL_CONSTRAINT"])=="YES"),"auto_increment"=>'0',"collation"=>trim($K["FIELD_COLLATION"]),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),"comment"=>trim($K["FIELD_DESCRIPTION"]),);return$J;}function
indexes($R,$i=null){$J=array();return$J;}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($lf){return
true;}function
support($hc){return
preg_match("~^(columns|sql|status|table)$~",$hc);}$x="firebird";$me=array("=");$Cc=array();$Gc=array();$Kb=array();}$Fb["simpledb"]="SimpleDB";if(isset($_GET["simpledb"])){$Ge=array("SimpleXML + allow_url_fopen");define("DRIVER","simpledb");if(class_exists('SimpleXMLElement')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="SimpleXML",$server_info='2009-04-15',$error,$timeout,$next,$affected_rows,$_result;function
select_db($k){return($k=="domain");}function
query($G,$zg=false){$E=array('SelectExpression'=>$G,'ConsistentRead'=>'true');if($this->next)$E['NextToken']=$this->next;$I=sdb_request_all('Select','Item',$E,$this->timeout);$this->timeout=0;if($I===false)return$I;if(preg_match('~^\s*SELECT\s+COUNT\(~i',$G)){$Sf=0;foreach($I
as$md)$Sf+=$md->Attribute->Value;$I=array((object)array('Attribute'=>array((object)array('Name'=>'Count','Value'=>$Sf,))));}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
quote($Q){return"'".str_replace("'","''",$Q)."'";}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0;function
__construct($I){foreach($I
as$md){$K=array();if($md->Name!='')$K['itemName()']=(string)$md->Name;foreach($md->Attribute
as$Ba){$B=$this->_processValue($Ba->Name);$Y=$this->_processValue($Ba->Value);if(isset($K[$B])){$K[$B]=(array)$K[$B];$K[$B][]=$Y;}else$K[$B]=$Y;}$this->_rows[]=$K;foreach($K
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
_processValue($Mb){return(is_object($Mb)&&$Mb['encoding']=='base64'?base64_decode($Mb):(string)$Mb);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$y=>$X)$J[$y]=$K[$y];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$rd=array_keys($this->_rows[0]);return(object)array('name'=>$rd[$this->_offset++]);}}}class
Min_Driver
extends
Min_SQL{public$Ie="itemName()";function
_chunkRequest($Uc,$qa,$E,$Zb=array()){global$h;foreach(array_chunk($Uc,25)as$Xa){$xe=$E;foreach($Xa
as$s=>$t){$xe["Item.$s.ItemName"]=$t;foreach($Zb
as$y=>$X)$xe["Item.$s.$y"]=$X;}if(!sdb_request($qa,$xe))return
false;}$h->affected_rows=count($Uc);return
true;}function
_extractIds($R,$H,$z){$J=array();if(preg_match_all("~itemName\(\) = (('[^']*+')+)~",$H,$Jd))$J=array_map('idf_unescape',$Jd[1]);else{foreach(sdb_request_all('Select','Item',array('SelectExpression'=>'SELECT itemName() FROM '.table($R).$H.($z?" LIMIT 1":"")))as$md)$J[]=$md->Name;}return$J;}function
select($R,$M,$Z,$Dc,$pe=array(),$z=1,$D=0,$Ke=false){global$h;$h->next=$_GET["next"];$J=parent::select($R,$M,$Z,$Dc,$pe,$z,$D,$Ke);$h->next=0;return$J;}function
delete($R,$H,$z=0){return$this->_chunkRequest($this->_extractIds($R,$H,$z),'BatchDeleteAttributes',array('DomainName'=>$R));}function
update($R,$P,$H,$z=0,$N="\n"){$yb=array();$hd=array();$s=0;$Uc=$this->_extractIds($R,$H,$z);$t=idf_unescape($P["`itemName()`"]);unset($P["`itemName()`"]);foreach($P
as$y=>$X){$y=idf_unescape($y);if($X=="NULL"||($t!=""&&array($t)!=$Uc))$yb["Attribute.".count($yb).".Name"]=$y;if($X!="NULL"){foreach((array)$X
as$nd=>$W){$hd["Attribute.$s.Name"]=$y;$hd["Attribute.$s.Value"]=(is_array($X)?$W:idf_unescape($W));if(!$nd)$hd["Attribute.$s.Replace"]="true";$s++;}}}$E=array('DomainName'=>$R);return(!$hd||$this->_chunkRequest(($t!=""?array($t):$Uc),'BatchPutAttributes',$E,$hd))&&(!$yb||$this->_chunkRequest($Uc,'BatchDeleteAttributes',$E,$yb));}function
insert($R,$P){$E=array("DomainName"=>$R);$s=0;foreach($P
as$B=>$Y){if($Y!="NULL"){$B=idf_unescape($B);if($B=="itemName()")$E["ItemName"]=idf_unescape($Y);else{foreach((array)$Y
as$X){$E["Attribute.$s.Name"]=$B;$E["Attribute.$s.Value"]=(is_array($Y)?$X:idf_unescape($Y));$s++;}}}}return
sdb_request('PutAttributes',$E);}function
insertUpdate($R,$L,$Ie){foreach($L
as$P){if(!$this->update($R,$P,"WHERE `itemName()` = ".q($P["`itemName()`"])))return
false;}return
true;}function
begin(){return
false;}function
commit(){return
false;}function
rollback(){return
false;}function
slowQuery($G,$eg){$this->_conn->timeout=$eg;return$G;}}function
connect(){global$b;list(,,$F)=$b->credentials();if($F!="")return'Database does not support password.';return
new
Min_DB;}function
support($hc){return
preg_match('~sql~',$hc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){return
array("domain");}function
collations(){return
array();}function
db_collation($m,$cb){}function
tables_list(){global$h;$J=array();foreach(sdb_request_all('ListDomains','DomainName')as$R)$J[(string)$R]='table';if($h->error&&defined("PAGE_HEADER"))echo"<p class='error'>".error()."\n";return$J;}function
table_status($B="",$gc=false){$J=array();foreach(($B!=""?array($B=>true):tables_list())as$R=>$U){$K=array("Name"=>$R,"Auto_increment"=>"");if(!$gc){$Rd=sdb_request('DomainMetadata',array('DomainName'=>$R));if($Rd){foreach(array("Rows"=>"ItemCount","Data_length"=>"ItemNamesSizeBytes","Index_length"=>"AttributeValuesSizeBytes","Data_free"=>"AttributeNamesSizeBytes",)as$y=>$X)$K[$y]=(string)$Rd->$X;}}if($B!="")return$K;$J[$R]=$K;}return$J;}function
explain($h,$G){}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("itemName()")),);}function
fields($R){return
fields_from_edit();}function
foreign_keys($R){return
array();}function
table($u){return
idf_escape($u);}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
limit($G,$Z,$z,$fe=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z":"");}function
unconvert_field($p,$J){return$J;}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){return($R==""&&sdb_request('CreateDomain',array('DomainName'=>$B)));}function
drop_tables($T){foreach($T
as$R){if(!sdb_request('DeleteDomain',array('DomainName'=>$R)))return
false;}return
true;}function
count_tables($l){foreach($l
as$m)return
array($m=>count(tables_list()));}function
found_rows($S,$Z){return($Z?null:$S["Rows"]);}function
last_id(){}function
hmac($va,$tb,$y,$Ue=false){$Na=64;if(strlen($y)>$Na)$y=pack("H*",$va($y));$y=str_pad($y,$Na,"\0");$od=$y^str_repeat("\x36",$Na);$pd=$y^str_repeat("\x5C",$Na);$J=$va($pd.pack("H*",$va($od.$tb)));if($Ue)$J=pack("H*",$J);return$J;}function
sdb_request($qa,$E=array()){global$b,$h;list($Qc,$E['AWSAccessKeyId'],$of)=$b->credentials();$E['Action']=$qa;$E['Timestamp']=gmdate('Y-m-d\TH:i:s+00:00');$E['Version']='2009-04-15';$E['SignatureVersion']=2;$E['SignatureMethod']='HmacSHA1';ksort($E);$G='';foreach($E
as$y=>$X)$G.='&'.rawurlencode($y).'='.rawurlencode($X);$G=str_replace('%7E','~',substr($G,1));$G.="&Signature=".urlencode(base64_encode(hmac('sha1',"POST\n".preg_replace('~^https?://~','',$Qc)."\n/\n$G",$of,true)));@ini_set('track_errors',1);$kc=@file_get_contents((preg_match('~^https?://~',$Qc)?$Qc:"http://$Qc"),false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$G,'ignore_errors'=>1,))));if(!$kc){$h->error=$php_errormsg;return
false;}libxml_use_internal_errors(true);$bh=simplexml_load_string($kc);if(!$bh){$o=libxml_get_last_error();$h->error=$o->message;return
false;}if($bh->Errors){$o=$bh->Errors->Error;$h->error="$o->Message ($o->Code)";return
false;}$h->error='';$Xf=$qa."Result";return($bh->$Xf?$bh->$Xf:true);}function
sdb_request_all($qa,$Xf,$E=array(),$eg=0){$J=array();$Kf=($eg?microtime(true):0);$z=(preg_match('~LIMIT\s+(\d+)\s*$~i',$E['SelectExpression'],$A)?$A[1]:0);do{$bh=sdb_request($qa,$E);if(!$bh)break;foreach($bh->$Xf
as$Mb)$J[]=$Mb;if($z&&count($J)>=$z){$_GET["next"]=$bh->NextToken;break;}if($eg&&microtime(true)-$Kf>$eg)return
false;$E['NextToken']=$bh->NextToken;if($z)$E['SelectExpression']=preg_replace('~\d+\s*$~',$z-count($J),$E['SelectExpression']);}while($bh->NextToken);return$J;}$x="simpledb";$me=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","IS NOT NULL");$Cc=array();$Gc=array("count");$Kb=array(array("json"));}$Fb["mongo"]="MongoDB";if(isset($_GET["mongo"])){$Ge=array("mongo","mongodb");define("DRIVER","mongo");if(class_exists('MongoDB')){class
Min_DB{var$extension="Mongo",$server_info=MongoClient::VERSION,$error,$last_id,$_link,$_db;function
connect($Gg,$C){return@new
MongoClient($Gg,$C);}function
query($G){return
false;}function
select_db($k){try{$this->_db=$this->_link->selectDB($k);return
true;}catch(Exception$Wb){$this->error=$Wb->getMessage();return
false;}}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$md){$K=array();foreach($md
as$y=>$X){if(is_a($X,'MongoBinData'))$this->_charset[$y]=63;$K[$y]=(is_a($X,'MongoId')?'ObjectId("'.strval($X).'")':(is_a($X,'MongoDate')?gmdate("Y-m-d H:i:s",$X->sec)." GMT":(is_a($X,'MongoBinData')?$X->bin:(is_a($X,'MongoRegex')?strval($X):(is_object($X)?get_class($X):$X)))));}$this->_rows[]=$K;foreach($K
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=count($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$y=>$X)$J[$y]=$K[$y];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$rd=array_keys($this->_rows[0]);$B=$rd[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Ie="_id";function
select($R,$M,$Z,$Dc,$pe=array(),$z=1,$D=0,$Ke=false){$M=($M==array("*")?array():array_fill_keys($M,true));$Df=array();foreach($pe
as$X){$X=preg_replace('~ DESC$~','',$X,1,$nb);$Df[$X]=($nb?-1:1);}return
new
Min_Result($this->_conn->_db->selectCollection($R)->find(array(),$M)->sort($Df)->limit($z!=""?+$z:0)->skip($D*$z));}function
insert($R,$P){try{$J=$this->_conn->_db->selectCollection($R)->insert($P);$this->_conn->errno=$J['code'];$this->_conn->error=$J['err'];$this->_conn->last_id=$P['_id'];return!$J['err'];}catch(Exception$Wb){$this->_conn->error=$Wb->getMessage();return
false;}}}function
get_databases($rc){global$h;$J=array();$vb=$h->_link->listDBs();foreach($vb['databases']as$m)$J[]=$m['name'];return$J;}function
count_tables($l){global$h;$J=array();foreach($l
as$m)$J[$m]=count($h->_link->selectDB($m)->getCollectionNames(true));return$J;}function
tables_list(){global$h;return
array_fill_keys($h->_db->getCollectionNames(true),'table');}function
drop_databases($l){global$h;foreach($l
as$m){$df=$h->_link->selectDB($m)->drop();if(!$df['ok'])return
false;}return
true;}function
indexes($R,$i=null){global$h;$J=array();foreach($h->_db->selectCollection($R)->getIndexInfo()as$v){$Ab=array();foreach($v["key"]as$f=>$U)$Ab[]=($U==-1?'1':null);$J[$v["name"]]=array("type"=>($v["name"]=="_id_"?"PRIMARY":($v["unique"]?"UNIQUE":"INDEX")),"columns"=>array_keys($v["key"]),"lengths"=>array(),"descs"=>$Ab,);}return$J;}function
fields($R){return
fields_from_edit();}function
found_rows($S,$Z){global$h;return$h->_db->selectCollection($_GET["select"])->count($Z);}$me=array("=");}elseif(class_exists('MongoDB\Driver\Manager')){class
Min_DB{var$extension="MongoDB",$server_info=MONGODB_VERSION,$error,$last_id;var$_link;var$_db,$_db_name;function
connect($Gg,$C){$d='MongoDB\Driver\Manager';return
new$d($Gg,$C);}function
query($G){return
false;}function
select_db($k){$this->_db_name=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows=array(),$_offset=0,$_charset=array();function
__construct($I){foreach($I
as$md){$K=array();foreach($md
as$y=>$X){if(is_a($X,'MongoDB\BSON\Binary'))$this->_charset[$y]=63;$K[$y]=(is_a($X,'MongoDB\BSON\ObjectID')?'MongoDB\BSON\ObjectID("'.strval($X).'")':(is_a($X,'MongoDB\BSON\UTCDatetime')?$X->toDateTime()->format('Y-m-d H:i:s'):(is_a($X,'MongoDB\BSON\Binary')?$X->bin:(is_a($X,'MongoDB\BSON\Regex')?strval($X):(is_object($X)?json_encode($X,256):$X)))));}$this->_rows[]=$K;foreach($K
as$y=>$X){if(!isset($this->_rows[0][$y]))$this->_rows[0][$y]=null;}}$this->num_rows=$I->count;}function
fetch_assoc(){$K=current($this->_rows);if(!$K)return$K;$J=array();foreach($this->_rows[0]as$y=>$X)$J[$y]=$K[$y];next($this->_rows);return$J;}function
fetch_row(){$J=$this->fetch_assoc();if(!$J)return$J;return
array_values($J);}function
fetch_field(){$rd=array_keys($this->_rows[0]);$B=$rd[$this->_offset++];return(object)array('name'=>$B,'charsetnr'=>$this->_charset[$B],);}}class
Min_Driver
extends
Min_SQL{public$Ie="_id";function
select($R,$M,$Z,$Dc,$pe=array(),$z=1,$D=0,$Ke=false){global$h;$M=($M==array("*")?array():array_fill_keys($M,1));if(count($M)&&!isset($M['_id']))$M['_id']=0;$Z=where_to_query($Z);$Df=array();foreach($pe
as$X){$X=preg_replace('~ DESC$~','',$X,1,$nb);$Df[$X]=($nb?-1:1);}if(isset($_GET['limit'])&&is_numeric($_GET['limit'])&&$_GET['limit']>0)$z=$_GET['limit'];$z=min(200,max(1,(int)$z));$Af=$D*$z;$d='MongoDB\Driver\Query';$G=new$d($Z,array('projection'=>$M,'limit'=>$z,'skip'=>$Af,'sort'=>$Df));$gf=$h->_link->executeQuery("$h->_db_name.$R",$G);return
new
Min_Result($gf);}function
update($R,$P,$H,$z=0,$N="\n"){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($H);$d='MongoDB\Driver\BulkWrite';$Ra=new$d(array());if(isset($P['_id']))unset($P['_id']);$Ze=array();foreach($P
as$y=>$Y){if($Y=='NULL'){$Ze[$y]=1;unset($P[$y]);}}$Fg=array('$set'=>$P);if(count($Ze))$Fg['$unset']=$Ze;$Ra->update($Z,$Fg,array('upsert'=>false));$gf=$h->_link->executeBulkWrite("$m.$R",$Ra);$h->affected_rows=$gf->getModifiedCount();return
true;}function
delete($R,$H,$z=0){global$h;$m=$h->_db_name;$Z=sql_query_where_parser($H);$d='MongoDB\Driver\BulkWrite';$Ra=new$d(array());$Ra->delete($Z,array('limit'=>$z));$gf=$h->_link->executeBulkWrite("$m.$R",$Ra);$h->affected_rows=$gf->getDeletedCount();return
true;}function
insert($R,$P){global$h;$m=$h->_db_name;$d='MongoDB\Driver\BulkWrite';$Ra=new$d(array());if(isset($P['_id'])&&empty($P['_id']))unset($P['_id']);$Ra->insert($P);$gf=$h->_link->executeBulkWrite("$m.$R",$Ra);$h->affected_rows=$gf->getInsertedCount();return
true;}}function
get_databases($rc){global$h;$J=array();$d='MongoDB\Driver\Command';$fb=new$d(array('listDatabases'=>1));$gf=$h->_link->executeCommand('admin',$fb);foreach($gf
as$vb){foreach($vb->databases
as$m)$J[]=$m->name;}return$J;}function
count_tables($l){$J=array();return$J;}function
tables_list(){global$h;$d='MongoDB\Driver\Command';$fb=new$d(array('listCollections'=>1));$gf=$h->_link->executeCommand($h->_db_name,$fb);$db=array();foreach($gf
as$I)$db[$I->name]='table';return$db;}function
drop_databases($l){return
false;}function
indexes($R,$i=null){global$h;$J=array();$d='MongoDB\Driver\Command';$fb=new$d(array('listIndexes'=>$R));$gf=$h->_link->executeCommand($h->_db_name,$fb);foreach($gf
as$v){$Ab=array();$g=array();foreach(get_object_vars($v->key)as$f=>$U){$Ab[]=($U==-1?'1':null);$g[]=$f;}$J[$v->name]=array("type"=>($v->name=="_id_"?"PRIMARY":(isset($v->unique)?"UNIQUE":"INDEX")),"columns"=>$g,"lengths"=>array(),"descs"=>$Ab,);}return$J;}function
fields($R){$q=fields_from_edit();if(!count($q)){global$n;$I=$n->select($R,array("*"),null,null,array(),10);while($K=$I->fetch_assoc()){foreach($K
as$y=>$X){$K[$y]=null;$q[$y]=array("field"=>$y,"type"=>"string","null"=>($y!=$n->primary),"auto_increment"=>($y==$n->primary),"privileges"=>array("insert"=>1,"select"=>1,"update"=>1,),);}}}return$q;}function
found_rows($S,$Z){global$h;$Z=where_to_query($Z);$d='MongoDB\Driver\Command';$fb=new$d(array('count'=>$S['Name'],'query'=>$Z));$gf=$h->_link->executeCommand($h->_db_name,$fb);$lg=$gf->toArray();return$lg[0]->n;}function
sql_query_where_parser($H){$H=trim(preg_replace('/WHERE[\s]?[(]?\(?/','',$H));$H=preg_replace('/\)\)\)$/',')',$H);$Yg=explode(' AND ',$H);$Zg=explode(') OR (',$H);$Z=array();foreach($Yg
as$Wg)$Z[]=trim($Wg);if(count($Zg)==1)$Zg=array();elseif(count($Zg)>1)$Z=array();return
where_to_query($Z,$Zg);}function
where_to_query($Ug=array(),$Vg=array()){global$b;$tb=array();foreach(array('and'=>$Ug,'or'=>$Vg)as$U=>$Z){if(is_array($Z)){foreach($Z
as$ac){list($bb,$ke,$X)=explode(" ",$ac,3);if($bb=="_id"){$X=str_replace('MongoDB\BSON\ObjectID("',"",$X);$X=str_replace('")',"",$X);$d='MongoDB\BSON\ObjectID';$X=new$d($X);}if(!in_array($ke,$b->operators))continue;if(preg_match('~^\(f\)(.+)~',$ke,$A)){$X=(float)$X;$ke=$A[1];}elseif(preg_match('~^\(date\)(.+)~',$ke,$A)){$ub=new
DateTime($X);$d='MongoDB\BSON\UTCDatetime';$X=new$d($ub->getTimestamp()*1000);$ke=$A[1];}switch($ke){case'=':$ke='$eq';break;case'!=':$ke='$ne';break;case'>':$ke='$gt';break;case'<':$ke='$lt';break;case'>=':$ke='$gte';break;case'<=':$ke='$lte';break;case'regex':$ke='$regex';break;default:continue
2;}if($U=='and')$tb['$and'][]=array($bb=>array($ke=>$X));elseif($U=='or')$tb['$or'][]=array($bb=>array($ke=>$X));}}}return$tb;}$me=array("=","!=",">","<",">=","<=","regex","(f)=","(f)!=","(f)>","(f)<","(f)>=","(f)<=","(date)=","(date)!=","(date)>","(date)<","(date)>=","(date)<=",);}function
table($u){return$u;}function
idf_escape($u){return$u;}function
table_status($B="",$gc=false){$J=array();foreach(tables_list()as$R=>$U){$J[$R]=array("Name"=>$R);if($B==$R)return$J[$R];}return$J;}function
create_database($m,$e){return
true;}function
last_id(){global$h;return$h->last_id;}function
error(){global$h;return
h($h->error);}function
collations(){return
array();}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
connect(){global$b;$h=new
Min_DB;list($O,$V,$F)=$b->credentials();$C=array();if($V.$F!=""){$C["username"]=$V;$C["password"]=$F;}$m=$b->database();if($m!="")$C["db"]=$m;try{$h->_link=$h->connect("mongodb://$O",$C);if($F!=""){$C["password"]="";try{$h->connect("mongodb://$O",$C);return'Database does not support password.';}catch(Exception$Wb){}}return$h;}catch(Exception$Wb){return$Wb->getMessage();}}function
alter_indexes($R,$c){global$h;foreach($c
as$X){list($U,$B,$P)=$X;if($P=="DROP")$J=$h->_db->command(array("deleteIndexes"=>$R,"index"=>$B));else{$g=array();foreach($P
as$f){$f=preg_replace('~ DESC$~','',$f,1,$nb);$g[$f]=($nb?-1:1);}$J=$h->_db->selectCollection($R)->ensureIndex($g,array("unique"=>($U=="UNIQUE"),"name"=>$B,));}if($J['errmsg']){$h->error=$J['errmsg'];return
false;}}return
true;}function
support($hc){return
preg_match("~database|indexes|descidx~",$hc);}function
db_collation($m,$cb){}function
information_schema(){}function
is_view($S){}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
foreign_keys($R){return
array();}function
fk_support($S){}function
engines(){return
array();}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){global$h;if($R==""){$h->_db->createCollection($B);return
true;}}function
drop_tables($T){global$h;foreach($T
as$R){$df=$h->_db->selectCollection($R)->drop();if(!$df['ok'])return
false;}return
true;}function
truncate_tables($T){global$h;foreach($T
as$R){$df=$h->_db->selectCollection($R)->remove();if(!$df['ok'])return
false;}return
true;}$x="mongo";$Cc=array();$Gc=array();$Kb=array(array("json"));}$Fb["elastic"]="Elasticsearch (beta)";if(isset($_GET["elastic"])){$Ge=array("json + allow_url_fopen");define("DRIVER","elastic");if(function_exists('json_decode')&&ini_bool('allow_url_fopen')){class
Min_DB{var$extension="JSON",$server_info,$errno,$error,$_url;function
rootQuery($Ae,$lb=array(),$Sd='GET'){@ini_set('track_errors',1);$kc=@file_get_contents("$this->_url/".ltrim($Ae,'/'),false,stream_context_create(array('http'=>array('method'=>$Sd,'content'=>$lb===null?$lb:json_encode($lb),'header'=>'Content-Type: application/json','ignore_errors'=>1,))));if(!$kc){$this->error=$php_errormsg;return$kc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$kc;return
false;}$J=json_decode($kc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$kb=get_defined_constants(true);foreach($kb['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return$J;}function
query($Ae,$lb=array(),$Sd='GET'){return$this->rootQuery(($this->_db!=""?"$this->_db/":"/").ltrim($Ae,'/'),$lb,$Sd);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$F@$A[2]";$J=$this->query('');if($J)$this->server_info=$J['version']['number'];return(bool)$J;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return$Q;}}class
Min_Result{var$num_rows,$_rows;function
__construct($L){$this->num_rows=count($this->_rows);$this->_rows=$L;reset($this->_rows);}function
fetch_assoc(){$J=current($this->_rows);next($this->_rows);return$J;}function
fetch_row(){return
array_values($this->fetch_assoc());}}}class
Min_Driver
extends
Min_SQL{function
select($R,$M,$Z,$Dc,$pe=array(),$z=1,$D=0,$Ke=false){global$b;$tb=array();$G="$R/_search";if($M!=array("*"))$tb["fields"]=$M;if($pe){$Df=array();foreach($pe
as$bb){$bb=preg_replace('~ DESC$~','',$bb,1,$nb);$Df[]=($nb?array($bb=>"desc"):$bb);}$tb["sort"]=$Df;}if($z){$tb["size"]=+$z;if($D)$tb["from"]=($D*$z);}foreach($Z
as$X){list($bb,$ke,$X)=explode(" ",$X,3);if($bb=="_id")$tb["query"]["ids"]["values"][]=$X;elseif($bb.$X!=""){$Zf=array("term"=>array(($bb!=""?$bb:"_all")=>$X));if($ke=="=")$tb["query"]["filtered"]["filter"]["and"][]=$Zf;else$tb["query"]["filtered"]["query"]["bool"]["must"][]=$Zf;}}if($tb["query"]&&!$tb["query"]["filtered"]["query"]&&!$tb["query"]["ids"])$tb["query"]["filtered"]["query"]=array("match_all"=>array());$Kf=microtime(true);$nf=$this->_conn->query($G,$tb);if($Ke)echo$b->selectQuery("$G: ".print_r($tb,true),$Kf,!$nf);if(!$nf)return
false;$J=array();foreach($nf['hits']['hits']as$Pc){$K=array();if($M==array("*"))$K["_id"]=$Pc["_id"];$q=$Pc['_source'];if($M!=array("*")){$q=array();foreach($M
as$y)$q[$y]=$Pc['fields'][$y];}foreach($q
as$y=>$X){if($tb["fields"])$X=$X[0];$K[$y]=(is_array($X)?json_encode($X):$X);}$J[]=$K;}return
new
Min_Result($J);}function
update($U,$Ve,$H,$z=0,$N="\n"){$_e=preg_split('~ *= *~',$H);if(count($_e)==2){$t=trim($_e[1]);$G="$U/$t";return$this->_conn->query($G,$Ve,'POST');}return
false;}function
insert($U,$Ve){$t="";$G="$U/$t";$df=$this->_conn->query($G,$Ve,'POST');$this->_conn->last_id=$df['_id'];return$df['created'];}function
delete($U,$H,$z=0){$Uc=array();if(is_array($_GET["where"])&&$_GET["where"]["_id"])$Uc[]=$_GET["where"]["_id"];if(is_array($_POST['check'])){foreach($_POST['check']as$Ta){$_e=preg_split('~ *= *~',$Ta);if(count($_e)==2)$Uc[]=trim($_e[1]);}}$this->_conn->affected_rows=0;foreach($Uc
as$t){$G="{$U}/{$t}";$df=$this->_conn->query($G,'{}','DELETE');if(is_array($df)&&$df['found']==true)$this->_conn->affected_rows++;}return$this->_conn->affected_rows;}}function
connect(){global$b;$h=new
Min_DB;list($O,$V,$F)=$b->credentials();if($F!=""&&$h->connect($O,$V,""))return'Database does not support password.';if($h->connect($O,$V,$F))return$h;return$h->error;}function
support($hc){return
preg_match("~database|table|columns~",$hc);}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
get_databases(){global$h;$J=$h->rootQuery('_aliases');if($J){$J=array_keys($J);sort($J,SORT_STRING);}return$J;}function
collations(){return
array();}function
db_collation($m,$cb){}function
engines(){return
array();}function
count_tables($l){global$h;$J=array();$I=$h->query('_stats');if($I&&$I['indices']){$ad=$I['indices'];foreach($ad
as$Zc=>$Lf){$Yc=$Lf['total']['indexing'];$J[$Zc]=$Yc['index_total'];}}return$J;}function
tables_list(){global$h;$J=$h->query('_mapping');if($J)$J=array_fill_keys(array_keys($J[$h->_db]["mappings"]),'table');return$J;}function
table_status($B="",$gc=false){global$h;$nf=$h->query("_search",array("size"=>0,"aggregations"=>array("count_by_type"=>array("terms"=>array("field"=>"_type")))),"POST");$J=array();if($nf){$T=$nf["aggregations"]["count_by_type"]["buckets"];foreach($T
as$R){$J[$R["key"]]=array("Name"=>$R["key"],"Engine"=>"table","Rows"=>$R["doc_count"],);if($B!=""&&$B==$R["key"])return$J[$B];}}return$J;}function
error(){global$h;return
h($h->error);}function
information_schema(){}function
is_view($S){}function
indexes($R,$i=null){return
array(array("type"=>"PRIMARY","columns"=>array("_id")),);}function
fields($R){global$h;$I=$h->query("$R/_mapping");$J=array();if($I){$Fd=$I[$R]['properties'];if(!$Fd)$Fd=$I[$h->_db]['mappings'][$R]['properties'];if($Fd){foreach($Fd
as$B=>$p){$J[$B]=array("field"=>$B,"full_type"=>$p["type"],"type"=>$p["type"],"privileges"=>array("insert"=>1,"select"=>1,"update"=>1),);if($p["properties"]){unset($J[$B]["privileges"]["insert"]);unset($J[$B]["privileges"]["update"]);}}}}return$J;}function
foreign_keys($R){return
array();}function
table($u){return$u;}function
idf_escape($u){return$u;}function
convert_field($p){}function
unconvert_field($p,$J){return$J;}function
fk_support($S){}function
found_rows($S,$Z){return
null;}function
create_database($m){global$h;return$h->rootQuery(urlencode($m),null,'PUT');}function
drop_databases($l){global$h;return$h->rootQuery(urlencode(implode(',',$l)),array(),'DELETE');}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){global$h;$Ne=array();foreach($q
as$ec){$ic=trim($ec[1][0]);$jc=trim($ec[1][1]?$ec[1][1]:"text");$Ne[$ic]=array('type'=>$jc);}if(!empty($Ne))$Ne=array('properties'=>$Ne);return$h->query("_mapping/{$B}",$Ne,'PUT');}function
drop_tables($T){global$h;$J=true;foreach($T
as$R)$J=$J&&$h->query(urlencode($R),array(),'DELETE');return$J;}function
last_id(){global$h;return$h->last_id;}$x="elastic";$me=array("=","query");$Cc=array();$Gc=array();$Kb=array(array("json"));$yg=array();$Of=array();foreach(array('Numeryczne'=>array("long"=>3,"integer"=>5,"short"=>8,"byte"=>10,"double"=>20,"float"=>66,"half_float"=>12,"scaled_float"=>21),'Data i czas'=>array("date"=>10),'Tekstowe'=>array("string"=>65535,"text"=>65535),'Binarne'=>array("binary"=>255),)as$y=>$X){$yg+=$X;$Of[$y]=array_keys($X);}}$Fb["clickhouse"]="ClickHouse (alpha)";if(isset($_GET["clickhouse"])){define("DRIVER","clickhouse");class
Min_DB{var$extension="JSON",$server_info,$errno,$_result,$error,$_url;var$_db='default';function
rootQuery($m,$G){@ini_set('track_errors',1);$kc=@file_get_contents("$this->_url/?database=$m",false,stream_context_create(array('http'=>array('method'=>'POST','content'=>$this->isQuerySelectLike($G)?"$G FORMAT JSONCompact":$G,'header'=>'Content-type: application/x-www-form-urlencoded','ignore_errors'=>1,))));if($kc===false){$this->error=$php_errormsg;return$kc;}if(!preg_match('~^HTTP/[0-9.]+ 2~i',$http_response_header[0])){$this->error=$kc;return
false;}$J=json_decode($kc,true);if($J===null){$this->errno=json_last_error();if(function_exists('json_last_error_msg'))$this->error=json_last_error_msg();else{$kb=get_defined_constants(true);foreach($kb['json']as$B=>$Y){if($Y==$this->errno&&preg_match('~^JSON_ERROR_~',$B)){$this->error=$B;break;}}}}return
new
Min_Result($J);}function
isQuerySelectLike($G){return(bool)preg_match('~^(select|show)~i',$G);}function
query($G){return$this->rootQuery($this->_db,$G);}function
connect($O,$V,$F){preg_match('~^(https?://)?(.*)~',$O,$A);$this->_url=($A[1]?$A[1]:"http://")."$V:$F@$A[2]";$J=$this->query('SELECT 1');return(bool)$J;}function
select_db($k){$this->_db=$k;return
true;}function
quote($Q){return"'".addcslashes($Q,"\\'")."'";}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);return$I['data'];}}class
Min_Result{var$num_rows,$_rows,$columns,$meta,$_offset=0;function
__construct($I){$this->num_rows=$I['rows'];$this->_rows=$I['data'];$this->meta=$I['meta'];$this->columns=array_column($this->meta,'name');reset($this->_rows);}function
fetch_assoc(){$K=current($this->_rows);next($this->_rows);return$K===false?false:array_combine($this->columns,$K);}function
fetch_row(){$K=current($this->_rows);next($this->_rows);return$K;}function
fetch_field(){$f=$this->_offset++;$J=new
stdClass;if($f<count($this->columns)){$J->name=$this->meta[$f]['name'];$J->orgname=$J->name;$J->type=$this->meta[$f]['type'];}return$J;}}class
Min_Driver
extends
Min_SQL{function
delete($R,$H,$z=0){return
queries("ALTER TABLE ".table($R)." DELETE $H");}function
update($R,$P,$H,$z=0,$N="\n"){$Mg=array();foreach($P
as$y=>$X)$Mg[]="$y = $X";$G=$N.implode(",$N",$Mg);return
queries("ALTER TABLE ".table($R)." UPDATE $G$H");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
explain($h,$G){return'';}function
found_rows($S,$Z){$L=get_vals("SELECT COUNT(*) FROM ".idf_escape($S["Name"]).($Z?" WHERE ".implode(" AND ",$Z):""));return
empty($L)?false:$L[0];}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){foreach($q
as$p){if($p[1][2]===" NULL")$p[1][1]=" Nullable({$p[1][1]})";unset($p[1][2]);}}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qg){return
drop_tables($Qg);}function
drop_tables($T){return
apply_queries("DROP TABLE",$T);}function
connect(){global$b;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2]))return$h;return$h->error;}function
get_databases($rc){global$h;$I=get_rows('SHOW DATABASES');$J=array();foreach($I
as$K)$J[]=$K['name'];sort($J);return$J;}function
limit($G,$Z,$z,$fe=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($fe?", $fe":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$cb){}function
engines(){return
array('MergeTree');}function
logged_user(){global$b;$j=$b->credentials();return$j[1];}function
tables_list(){$I=get_rows('SHOW TABLES');$J=array();foreach($I
as$K)$J[$K['name']]='table';ksort($J);return$J;}function
count_tables($l){return
array();}function
table_status($B="",$gc=false){global$h;$J=array();$T=get_rows("SELECT name, engine FROM system.tables WHERE database = ".q($h->_db));foreach($T
as$R){$J[$R['name']]=array('Name'=>$R['name'],'Engine'=>$R['engine'],);if($B===$R['name'])return$J[$R['name']];}return$J;}function
is_view($S){return
false;}function
fk_support($S){return
false;}function
convert_field($p){}function
unconvert_field($p,$J){if(in_array($p['type'],array("Int8","Int16","Int32","Int64","UInt8","UInt16","UInt32","UInt64","Float32","Float64")))return"to$p[type]($J)";return$J;}function
fields($R){$J=array();$I=get_rows("SELECT name, type, default_expression FROM system.columns WHERE ".idf_escape('table')." = ".q($R));foreach($I
as$K){$U=trim($K['type']);$be=strpos($U,'Nullable(')===0;$J[trim($K['name'])]=array("field"=>trim($K['name']),"full_type"=>$U,"type"=>$U,"default"=>trim($K['default_expression']),"null"=>$be,"auto_increment"=>'0',"privileges"=>array("insert"=>1,"select"=>1,"update"=>0),);}return$J;}function
indexes($R,$i=null){return
array();}function
foreign_keys($R){return
array();}function
collations(){return
array();}function
information_schema($m){return
false;}function
error(){global$h;return
h($h->error);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($lf){return
true;}function
auto_increment(){return'';}function
last_id(){return
0;}function
support($hc){return
preg_match("~^(columns|sql|status|table)$~",$hc);}$x="clickhouse";$yg=array();$Of=array();foreach(array('Numeryczne'=>array("Int8"=>3,"Int16"=>5,"Int32"=>10,"Int64"=>19,"UInt8"=>3,"UInt16"=>5,"UInt32"=>10,"UInt64"=>20,"Float32"=>7,"Float64"=>16,'Decimal'=>38,'Decimal32'=>9,'Decimal64'=>18,'Decimal128'=>38),'Data i czas'=>array("Date"=>13,"DateTime"=>20),'Tekstowe'=>array("String"=>0),'Binarne'=>array("FixedString"=>0),)as$y=>$X){$yg+=$X;$Of[$y]=array_keys($X);}$Eg=array();$me=array("=","<",">","<=",">=","!=","~","!~","LIKE","LIKE %%","IN","IS NULL","NOT LIKE","NOT IN","IS NOT NULL","SQL");$Cc=array();$Gc=array("avg","count","count distinct","max","min","sum");$Kb=array();}$Fb=array("server"=>"MySQL")+$Fb;if(!defined("DRIVER")){$Ge=array("MySQLi","MySQL","PDO_MySQL");define("DRIVER","server");if(extension_loaded("mysqli")){class
Min_DB
extends
MySQLi{var$extension="MySQLi";function
__construct(){parent::init();}function
connect($O="",$V="",$F="",$k=null,$Ee=null,$Cf=null){global$b;mysqli_report(MYSQLI_REPORT_OFF);list($Qc,$Ee)=explode(":",$O,2);$Jf=$b->connectSsl();if($Jf)$this->ssl_set($Jf['key'],$Jf['cert'],$Jf['ca'],'','');$J=@$this->real_connect(($O!=""?$Qc:ini_get("mysqli.default_host")),($O.$V!=""?$V:ini_get("mysqli.default_user")),($O.$V.$F!=""?$F:ini_get("mysqli.default_pw")),$k,(is_numeric($Ee)?$Ee:ini_get("mysqli.default_port")),(!is_numeric($Ee)?$Ee:$Cf),($Jf?64:0));$this->options(MYSQLI_OPT_LOCAL_INFILE,false);return$J;}function
set_charset($Sa){if(parent::set_charset($Sa))return
true;parent::set_charset('utf8');return$this->query("SET NAMES $Sa");}function
result($G,$p=0){$I=$this->query($G);if(!$I)return
false;$K=$I->fetch_array();return$K[$p];}function
quote($Q){return"'".$this->escape_string($Q)."'";}}}elseif(extension_loaded("mysql")&&!((ini_bool("sql.safe_mode")||ini_bool("mysql.allow_local_infile"))&&extension_loaded("pdo_mysql"))){class
Min_DB{var$extension="MySQL",$server_info,$affected_rows,$errno,$error,$_link,$_result;function
connect($O,$V,$F){if(ini_bool("mysql.allow_local_infile")){$this->error=sprintf('Disable %s or enable %s or %s extensions.',"'mysql.allow_local_infile'","MySQLi","PDO_MySQL");return
false;}$this->_link=@mysql_connect(($O!=""?$O:ini_get("mysql.default_host")),("$O$V"!=""?$V:ini_get("mysql.default_user")),("$O$V$F"!=""?$F:ini_get("mysql.default_password")),true,131072);if($this->_link)$this->server_info=mysql_get_server_info($this->_link);else$this->error=mysql_error();return(bool)$this->_link;}function
set_charset($Sa){if(function_exists('mysql_set_charset')){if(mysql_set_charset($Sa,$this->_link))return
true;mysql_set_charset('utf8',$this->_link);}return$this->query("SET NAMES $Sa");}function
quote($Q){return"'".mysql_real_escape_string($Q,$this->_link)."'";}function
select_db($k){return
mysql_select_db($k,$this->_link);}function
query($G,$zg=false){$I=@($zg?mysql_unbuffered_query($G,$this->_link):mysql_query($G,$this->_link));$this->error="";if(!$I){$this->errno=mysql_errno($this->_link);$this->error=mysql_error($this->_link);return
false;}if($I===true){$this->affected_rows=mysql_affected_rows($this->_link);$this->info=mysql_info($this->_link);return
true;}return
new
Min_Result($I);}function
multi_query($G){return$this->_result=$this->query($G);}function
store_result(){return$this->_result;}function
next_result(){return
false;}function
result($G,$p=0){$I=$this->query($G);if(!$I||!$I->num_rows)return
false;return
mysql_result($I->_result,0,$p);}}class
Min_Result{var$num_rows,$_result,$_offset=0;function
__construct($I){$this->_result=$I;$this->num_rows=mysql_num_rows($I);}function
fetch_assoc(){return
mysql_fetch_assoc($this->_result);}function
fetch_row(){return
mysql_fetch_row($this->_result);}function
fetch_field(){$J=mysql_fetch_field($this->_result,$this->_offset++);$J->orgtable=$J->table;$J->orgname=$J->name;$J->charsetnr=($J->blob?63:0);return$J;}function
__destruct(){mysql_free_result($this->_result);}}}elseif(extension_loaded("pdo_mysql")){class
Min_DB
extends
Min_PDO{var$extension="PDO_MySQL";function
connect($O,$V,$F){global$b;$C=array(PDO::MYSQL_ATTR_LOCAL_INFILE=>false);$Jf=$b->connectSsl();if($Jf)$C+=array(PDO::MYSQL_ATTR_SSL_KEY=>$Jf['key'],PDO::MYSQL_ATTR_SSL_CERT=>$Jf['cert'],PDO::MYSQL_ATTR_SSL_CA=>$Jf['ca'],);$this->dsn("mysql:charset=utf8;host=".str_replace(":",";unix_socket=",preg_replace('~:(\d)~',';port=\1',$O)),$V,$F,$C);return
true;}function
set_charset($Sa){$this->query("SET NAMES $Sa");}function
select_db($k){return$this->query("USE ".idf_escape($k));}function
query($G,$zg=false){$this->setAttribute(1000,!$zg);return
parent::query($G,$zg);}}}class
Min_Driver
extends
Min_SQL{function
insert($R,$P){return($P?parent::insert($R,$P):queries("INSERT INTO ".table($R)." ()\nVALUES ()"));}function
insertUpdate($R,$L,$Ie){$g=array_keys(reset($L));$He="INSERT INTO ".table($R)." (".implode(", ",$g).") VALUES\n";$Mg=array();foreach($g
as$y)$Mg[$y]="$y = VALUES($y)";$Rf="\nON DUPLICATE KEY UPDATE ".implode(", ",$Mg);$Mg=array();$zd=0;foreach($L
as$P){$Y="(".implode(", ",$P).")";if($Mg&&(strlen($He)+$zd+strlen($Y)+strlen($Rf)>1e6)){if(!queries($He.implode(",\n",$Mg).$Rf))return
false;$Mg=array();$zd=0;}$Mg[]=$Y;$zd+=strlen($Y)+2;}return
queries($He.implode(",\n",$Mg).$Rf);}function
slowQuery($G,$eg){if(min_version('5.7.8','10.1.2')){if(preg_match('~MariaDB~',$this->_conn->server_info))return"SET STATEMENT max_statement_time=$eg FOR $G";elseif(preg_match('~^(SELECT\b)(.+)~is',$G,$A))return"$A[1] /*+ MAX_EXECUTION_TIME(".($eg*1000).") */ $A[2]";}}function
convertSearch($u,$X,$p){return(preg_match('~char|text|enum|set~',$p["type"])&&!preg_match("~^utf8~",$p["collation"])&&preg_match('~[\x80-\xFF]~',$X['val'])?"CONVERT($u USING ".charset($this->_conn).")":$u);}function
warnings(){$I=$this->_conn->query("SHOW WARNINGS");if($I&&$I->num_rows){ob_start();select($I);return
ob_get_clean();}}function
tableHelp($B){$Gd=preg_match('~MariaDB~',$this->_conn->server_info);if(information_schema(DB))return
strtolower(($Gd?"information-schema-$B-table/":str_replace("_","-",$B)."-table.html"));if(DB=="mysql")return($Gd?"mysql$B-table/":"system-database.html");}}function
idf_escape($u){return"`".str_replace("`","``",$u)."`";}function
table($u){return
idf_escape($u);}function
connect(){global$b,$yg,$Of;$h=new
Min_DB;$j=$b->credentials();if($h->connect($j[0],$j[1],$j[2])){$h->set_charset(charset($h));$h->query("SET sql_quote_show_create = 1, autocommit = 1");if(min_version('5.7.8',10.2,$h)){$Of['Tekstowe'][]="json";$yg["json"]=4294967295;}return$h;}$J=$h->error;if(function_exists('iconv')&&!is_utf8($J)&&strlen($kf=iconv("windows-1250","utf-8",$J))>strlen($J))$J=$kf;return$J;}function
get_databases($rc){$J=get_session("dbs");if($J===null){$G=(min_version(5)?"SELECT SCHEMA_NAME FROM information_schema.SCHEMATA ORDER BY SCHEMA_NAME":"SHOW DATABASES");$J=($rc?slow_query($G):get_vals($G));restart_session();set_session("dbs",$J);stop_session();}return$J;}function
limit($G,$Z,$z,$fe=0,$N=" "){return" $G$Z".($z!==null?$N."LIMIT $z".($fe?" OFFSET $fe":""):"");}function
limit1($R,$G,$Z,$N="\n"){return
limit($G,$Z,1,0,$N);}function
db_collation($m,$cb){global$h;$J=null;$ob=$h->result("SHOW CREATE DATABASE ".idf_escape($m),1);if(preg_match('~ COLLATE ([^ ]+)~',$ob,$A))$J=$A[1];elseif(preg_match('~ CHARACTER SET ([^ ]+)~',$ob,$A))$J=$cb[$A[1]][-1];return$J;}function
engines(){$J=array();foreach(get_rows("SHOW ENGINES")as$K){if(preg_match("~YES|DEFAULT~",$K["Support"]))$J[]=$K["Engine"];}return$J;}function
logged_user(){global$h;return$h->result("SELECT USER()");}function
tables_list(){return
get_key_vals(min_version(5)?"SELECT TABLE_NAME, TABLE_TYPE FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ORDER BY TABLE_NAME":"SHOW TABLES");}function
count_tables($l){$J=array();foreach($l
as$m)$J[$m]=count(get_vals("SHOW TABLES IN ".idf_escape($m)));return$J;}function
table_status($B="",$gc=false){$J=array();foreach(get_rows($gc&&min_version(5)?"SELECT TABLE_NAME AS Name, ENGINE AS Engine, TABLE_COMMENT AS Comment FROM information_schema.TABLES WHERE TABLE_SCHEMA = DATABASE() ".($B!=""?"AND TABLE_NAME = ".q($B):"ORDER BY Name"):"SHOW TABLE STATUS".($B!=""?" LIKE ".q(addcslashes($B,"%_\\")):""))as$K){if($K["Engine"]=="InnoDB")$K["Comment"]=preg_replace('~(?:(.+); )?InnoDB free: .*~','\1',$K["Comment"]);if(!isset($K["Engine"]))$K["Comment"]="";if($B!="")return$K;$J[$K["Name"]]=$K;}return$J;}function
is_view($S){return$S["Engine"]===null;}function
fk_support($S){return
preg_match('~InnoDB|IBMDB2I~i',$S["Engine"])||(preg_match('~NDB~i',$S["Engine"])&&min_version(5.6));}function
fields($R){$J=array();foreach(get_rows("SHOW FULL COLUMNS FROM ".table($R))as$K){preg_match('~^([^( ]+)(?:\((.+)\))?( unsigned)?( zerofill)?$~',$K["Type"],$A);$J[$K["Field"]]=array("field"=>$K["Field"],"full_type"=>$K["Type"],"type"=>$A[1],"length"=>$A[2],"unsigned"=>ltrim($A[3].$A[4]),"default"=>($K["Default"]!=""||preg_match("~char|set~",$A[1])?$K["Default"]:null),"null"=>($K["Null"]=="YES"),"auto_increment"=>($K["Extra"]=="auto_increment"),"on_update"=>(preg_match('~^on update (.+)~i',$K["Extra"],$A)?$A[1]:""),"collation"=>$K["Collation"],"privileges"=>array_flip(preg_split('~, *~',$K["Privileges"])),"comment"=>$K["Comment"],"primary"=>($K["Key"]=="PRI"),);}return$J;}function
indexes($R,$i=null){$J=array();foreach(get_rows("SHOW INDEX FROM ".table($R),$i)as$K){$B=$K["Key_name"];$J[$B]["type"]=($B=="PRIMARY"?"PRIMARY":($K["Index_type"]=="FULLTEXT"?"FULLTEXT":($K["Non_unique"]?($K["Index_type"]=="SPATIAL"?"SPATIAL":"INDEX"):"UNIQUE")));$J[$B]["columns"][]=$K["Column_name"];$J[$B]["lengths"][]=($K["Index_type"]=="SPATIAL"?null:$K["Sub_part"]);$J[$B]["descs"][]=null;}return$J;}function
foreign_keys($R){global$h,$he;static$Be='(?:`(?:[^`]|``)+`)|(?:"(?:[^"]|"")+")';$J=array();$pb=$h->result("SHOW CREATE TABLE ".table($R),1);if($pb){preg_match_all("~CONSTRAINT ($Be) FOREIGN KEY ?\\(((?:$Be,? ?)+)\\) REFERENCES ($Be)(?:\\.($Be))? \\(((?:$Be,? ?)+)\\)(?: ON DELETE ($he))?(?: ON UPDATE ($he))?~",$pb,$Jd,PREG_SET_ORDER);foreach($Jd
as$A){preg_match_all("~$Be~",$A[2],$Ef);preg_match_all("~$Be~",$A[5],$Yf);$J[idf_unescape($A[1])]=array("db"=>idf_unescape($A[4]!=""?$A[3]:$A[4]),"table"=>idf_unescape($A[4]!=""?$A[4]:$A[3]),"source"=>array_map('idf_unescape',$Ef[0]),"target"=>array_map('idf_unescape',$Yf[0]),"on_delete"=>($A[6]?$A[6]:"RESTRICT"),"on_update"=>($A[7]?$A[7]:"RESTRICT"),);}}return$J;}function
view($B){global$h;return
array("select"=>preg_replace('~^(?:[^`]|`[^`]*`)*\s+AS\s+~isU','',$h->result("SHOW CREATE VIEW ".table($B),1)));}function
collations(){$J=array();foreach(get_rows("SHOW COLLATION")as$K){if($K["Default"])$J[$K["Charset"]][-1]=$K["Collation"];else$J[$K["Charset"]][]=$K["Collation"];}ksort($J);foreach($J
as$y=>$X)asort($J[$y]);return$J;}function
information_schema($m){return(min_version(5)&&$m=="information_schema")||(min_version(5.5)&&$m=="performance_schema");}function
error(){global$h;return
h(preg_replace('~^You have an error.*syntax to use~U',"Syntax error",$h->error));}function
create_database($m,$e){return
queries("CREATE DATABASE ".idf_escape($m).($e?" COLLATE ".q($e):""));}function
drop_databases($l){$J=apply_queries("DROP DATABASE",$l,'idf_escape');restart_session();set_session("dbs",null);return$J;}function
rename_database($B,$e){$J=false;if(create_database($B,$e)){$af=array();foreach(tables_list()as$R=>$U)$af[]=table($R)." TO ".idf_escape($B).".".table($R);$J=(!$af||queries("RENAME TABLE ".implode(", ",$af)));if($J)queries("DROP DATABASE ".idf_escape(DB));restart_session();set_session("dbs",null);}return$J;}function
auto_increment(){$Fa=" PRIMARY KEY";if($_GET["create"]!=""&&$_POST["auto_increment_col"]){foreach(indexes($_GET["create"])as$v){if(in_array($_POST["fields"][$_POST["auto_increment_col"]]["orig"],$v["columns"],true)){$Fa="";break;}if($v["type"]=="PRIMARY")$Fa=" UNIQUE";}}return" AUTO_INCREMENT$Fa";}function
alter_table($R,$B,$q,$tc,$gb,$Rb,$e,$Ea,$ze){$c=array();foreach($q
as$p)$c[]=($p[1]?($R!=""?($p[0]!=""?"CHANGE ".idf_escape($p[0]):"ADD"):" ")." ".implode($p[1]).($R!=""?$p[2]:""):"DROP ".idf_escape($p[0]));$c=array_merge($c,$tc);$Mf=($gb!==null?" COMMENT=".q($gb):"").($Rb?" ENGINE=".q($Rb):"").($e?" COLLATE ".q($e):"").($Ea!=""?" AUTO_INCREMENT=$Ea":"");if($R=="")return
queries("CREATE TABLE ".table($B)." (\n".implode(",\n",$c)."\n)$Mf$ze");if($R!=$B)$c[]="RENAME TO ".table($B);if($Mf)$c[]=ltrim($Mf);return($c||$ze?queries("ALTER TABLE ".table($R)."\n".implode(",\n",$c).$ze):true);}function
alter_indexes($R,$c){foreach($c
as$y=>$X)$c[$y]=($X[2]=="DROP"?"\nDROP INDEX ".idf_escape($X[1]):"\nADD $X[0] ".($X[0]=="PRIMARY"?"KEY ":"").($X[1]!=""?idf_escape($X[1])." ":"")."(".implode(", ",$X[2]).")");return
queries("ALTER TABLE ".table($R).implode(",",$c));}function
truncate_tables($T){return
apply_queries("TRUNCATE TABLE",$T);}function
drop_views($Qg){return
queries("DROP VIEW ".implode(", ",array_map('table',$Qg)));}function
drop_tables($T){return
queries("DROP TABLE ".implode(", ",array_map('table',$T)));}function
move_tables($T,$Qg,$Yf){$af=array();foreach(array_merge($T,$Qg)as$R)$af[]=table($R)." TO ".idf_escape($Yf).".".table($R);return
queries("RENAME TABLE ".implode(", ",$af));}function
copy_tables($T,$Qg,$Yf){queries("SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO'");foreach($T
as$R){$B=($Yf==DB?table("copy_$R"):idf_escape($Yf).".".table($R));if(!queries("CREATE TABLE $B LIKE ".table($R))||!queries("INSERT INTO $B SELECT * FROM ".table($R)))return
false;foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K){$tg=$K["Trigger"];if(!queries("CREATE TRIGGER ".($Yf==DB?idf_escape("copy_$tg"):idf_escape($Yf).".".idf_escape($tg))." $K[Timing] $K[Event] ON $B FOR EACH ROW\n$K[Statement];"))return
false;}}foreach($Qg
as$R){$B=($Yf==DB?table("copy_$R"):idf_escape($Yf).".".table($R));$Pg=view($R);if(!queries("CREATE VIEW $B AS $Pg[select]"))return
false;}return
true;}function
trigger($B){if($B=="")return
array();$L=get_rows("SHOW TRIGGERS WHERE `Trigger` = ".q($B));return
reset($L);}function
triggers($R){$J=array();foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")))as$K)$J[$K["Trigger"]]=array($K["Timing"],$K["Event"]);return$J;}function
trigger_options(){return
array("Timing"=>array("BEFORE","AFTER"),"Event"=>array("INSERT","UPDATE","DELETE"),"Type"=>array("FOR EACH ROW"),);}function
routine($B,$U){global$h,$Sb,$fd,$yg;$wa=array("bool","boolean","integer","double precision","real","dec","numeric","fixed","national char","national varchar");$Ff="(?:\\s|/\\*[\s\S]*?\\*/|(?:#|-- )[^\n]*\n?|--\r?\n)";$xg="((".implode("|",array_merge(array_keys($yg),$wa)).")\\b(?:\\s*\\(((?:[^'\")]|$Sb)++)\\))?\\s*(zerofill\\s*)?(unsigned(?:\\s+zerofill)?)?)(?:\\s*(?:CHARSET|CHARACTER\\s+SET)\\s*['\"]?([^'\"\\s,]+)['\"]?)?";$Be="$Ff*(".($U=="FUNCTION"?"":$fd).")?\\s*(?:`((?:[^`]|``)*)`\\s*|\\b(\\S+)\\s+)$xg";$ob=$h->result("SHOW CREATE $U ".idf_escape($B),2);preg_match("~\\(((?:$Be\\s*,?)*)\\)\\s*".($U=="FUNCTION"?"RETURNS\\s+$xg\\s+":"")."(.*)~is",$ob,$A);$q=array();preg_match_all("~$Be\\s*,?~is",$A[1],$Jd,PREG_SET_ORDER);foreach($Jd
as$we){$B=str_replace("``","`",$we[2]).$we[3];$q[]=array("field"=>$B,"type"=>strtolower($we[5]),"length"=>preg_replace_callback("~$Sb~s",'normalize_enum',$we[6]),"unsigned"=>strtolower(preg_replace('~\s+~',' ',trim("$we[8] $we[7]"))),"null"=>1,"full_type"=>$we[4],"inout"=>strtoupper($we[1]),"collation"=>strtolower($we[9]),);}if($U!="FUNCTION")return
array("fields"=>$q,"definition"=>$A[11]);return
array("fields"=>$q,"returns"=>array("type"=>$A[12],"length"=>$A[13],"unsigned"=>$A[15],"collation"=>$A[16]),"definition"=>$A[17],"language"=>"SQL",);}function
routines(){return
get_rows("SELECT ROUTINE_NAME AS SPECIFIC_NAME, ROUTINE_NAME, ROUTINE_TYPE, DTD_IDENTIFIER FROM information_schema.ROUTINES WHERE ROUTINE_SCHEMA = ".q(DB));}function
routine_languages(){return
array();}function
routine_id($B,$K){return
idf_escape($B);}function
last_id(){global$h;return$h->result("SELECT LAST_INSERT_ID()");}function
explain($h,$G){return$h->query("EXPLAIN ".(min_version(5.1)?"PARTITIONS ":"").$G);}function
found_rows($S,$Z){return($Z||$S["Engine"]!="InnoDB"?null:$S["Rows"]);}function
types(){return
array();}function
schemas(){return
array();}function
get_schema(){return"";}function
set_schema($lf){return
true;}function
create_sql($R,$Ea,$Pf){global$h;$J=$h->result("SHOW CREATE TABLE ".table($R),1);if(!$Ea)$J=preg_replace('~ AUTO_INCREMENT=\d+~','',$J);return$J;}function
truncate_sql($R){return"TRUNCATE ".table($R);}function
use_sql($k){return"USE ".idf_escape($k);}function
trigger_sql($R){$J="";foreach(get_rows("SHOW TRIGGERS LIKE ".q(addcslashes($R,"%_\\")),null,"-- ")as$K)$J.="\nCREATE TRIGGER ".idf_escape($K["Trigger"])." $K[Timing] $K[Event] ON ".table($K["Table"])." FOR EACH ROW\n$K[Statement];;\n";return$J;}function
show_variables(){return
get_key_vals("SHOW VARIABLES");}function
process_list(){return
get_rows("SHOW FULL PROCESSLIST");}function
show_status(){return
get_key_vals("SHOW STATUS");}function
convert_field($p){if(preg_match("~binary~",$p["type"]))return"HEX(".idf_escape($p["field"]).")";if($p["type"]=="bit")return"BIN(".idf_escape($p["field"])." + 0)";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))return(min_version(8)?"ST_":"")."AsWKT(".idf_escape($p["field"]).")";}function
unconvert_field($p,$J){if(preg_match("~binary~",$p["type"]))$J="UNHEX($J)";if($p["type"]=="bit")$J="CONV($J, 2, 10) + 0";if(preg_match("~geometry|point|linestring|polygon~",$p["type"]))$J=(min_version(8)?"ST_":"")."GeomFromText($J)";return$J;}function
support($hc){return!preg_match("~scheme|sequence|type|view_trigger|materializedview".(min_version(8)?"":"|descidx".(min_version(5.1)?"":"|event|partitioning".(min_version(5)?"":"|routine|trigger|view")))."~",$hc);}function
kill_process($X){return
queries("KILL ".number($X));}function
connection_id(){return"SELECT CONNECTION_ID()";}function
max_connections(){global$h;return$h->result("SELECT @@max_connections");}$x="sql";$yg=array();$Of=array();foreach(array('Numeryczne'=>array("tinyint"=>3,"smallint"=>5,"mediumint"=>8,"int"=>10,"bigint"=>20,"decimal"=>66,"float"=>12,"double"=>21),'Data i czas'=>array("date"=>10,"datetime"=>19,"timestamp"=>19,"time"=>10,"year"=>4),'Tekstowe'=>array("char"=>255,"varchar"=>65535,"tinytext"=>255,"text"=>65535,"mediumtext"=>16777215,"longtext"=>4294967295),'Listy'=>array("enum"=>65535,"set"=>64),'Binarne'=>array("bit"=>20,"binary"=>255,"varbinary"=>65535,"tinyblob"=>255,"blob"=>65535,"mediumblob"=>16777215,"longblob"=>4294967295),'Geometria'=>array("geometry"=>0,"point"=>0,"linestring"=>0,"polygon"=>0,"multipoint"=>0,"multilinestring"=>0,"multipolygon"=>0,"geometrycollection"=>0),)as$y=>$X){$yg+=$X;$Of[$y]=array_keys($X);}$Eg=array("unsigned","zerofill","unsigned zerofill");$me=array("=","<",">","<=",">=","!=","LIKE","LIKE %%","REGEXP","IN","FIND_IN_SET","IS NULL","NOT LIKE","NOT REGEXP","NOT IN","IS NOT NULL","SQL");$Cc=array("char_length","date","from_unixtime","lower","round","floor","ceil","sec_to_time","time_to_sec","upper");$Gc=array("avg","count","count distinct","group_concat","max","min","sum");$Kb=array(array("char"=>"md5/sha1/password/encrypt/uuid","binary"=>"md5/sha1","date|time"=>"now",),array(number_type()=>"+/-","date"=>"+ interval/- interval","time"=>"addtime/subtime","char|text"=>"concat",));}define("SERVER",$_GET[DRIVER]);define("DB",$_GET["db"]);define("ME",preg_replace('~^[^?]*/([^?]*).*~','\1',$_SERVER["REQUEST_URI"]).'?'.(sid()?SID.'&':'').(SERVER!==null?DRIVER."=".urlencode(SERVER).'&':'').(isset($_GET["username"])?"username=".urlencode($_GET["username"]).'&':'').(DB!=""?'db='.urlencode(DB).'&'.(isset($_GET["ns"])?"ns=".urlencode($_GET["ns"])."&":""):''));$ca="";class
Adminer{var$operators=array("<=",">=");var$_values=array();function
name(){return"<a href='index.php'".target_blank()." id='h1'>".'Strona GÅ‚Ã³wna'."</a>";}function
credentials(){return
array(SERVER,$_GET["username"],get_password());}function
connectSsl(){}function
permanentLogin($ob=false){return
password_file($ob);}function
bruteForceKey(){return$_SERVER["REMOTE_ADDR"];}function
serverName($O){}function
database(){global$h;if($h){$l=$this->databases(false);return(!$l?$h->result("SELECT SUBSTRING_INDEX(CURRENT_USER, '@', 1)"):$l[(information_schema($l[0])?1:0)]);}}function
schemas(){return
schemas();}function
databases($rc=true){return
get_databases($rc);}function
queryTimeout(){return
5;}function
headers(){}function
csp(){return
csp();}function
head(){return
true;}function
css(){$J=array();$r="adminer.css";if(file_exists($r))$J[]=$r;return$J;}function
loginForm(){echo"<table cellspacing='0' class='layout'>\n",$this->loginFormField('username','<tr><th>'.'UÅ¼ytkownik'.'<td>','<input type="hidden" name="auth[driver]" value="server"><input name="auth[username]" id="username" value="'.h($_GET["username"]).'" autocomplete="username" autocapitalize="off">'.script("focus(qs('#username'));")),$this->loginFormField('password','<tr><th>'.'HasÅ‚o'.'<td>','<input type="password" name="auth[password]" autocomplete="current-password">'."\n"),"</table>\n","<p><input type='submit' value='".'Zaloguj siÄ™'."'>\n",checkbox("auth[permanent]",1,$_COOKIE["adminer_permanent"],'ZapamiÄ™taj sesjÄ™')."\n";}function
loginFormField($B,$Nc,$Y){return$Nc.$Y;}function
login($Dd,$F){return
true;}function
tableName($Uf){return
h($Uf["Comment"]!=""?$Uf["Comment"]:$Uf["Name"]);}function
fieldName($p,$pe=0){return
h(preg_replace('~\s+\[.*\]$~','',($p["comment"]!=""?$p["comment"]:$p["field"])));}function
selectLinks($Uf,$P=""){$a=$Uf["Name"];if($P!==null)echo'<p class="tabs"><a href="'.h(ME.'edit='.urlencode($a).$P).'">'.'Nowy rekord'."</a>\n";}function
foreignKeys($R){return
foreign_keys($R);}function
backwardKeys($R,$Tf){$J=array();foreach(get_rows("SELECT TABLE_NAME, CONSTRAINT_NAME, COLUMN_NAME, REFERENCED_COLUMN_NAME
FROM information_schema.KEY_COLUMN_USAGE
WHERE TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_SCHEMA = ".q($this->database())."
AND REFERENCED_TABLE_NAME = ".q($R)."
ORDER BY ORDINAL_POSITION",null,"")as$K)$J[$K["TABLE_NAME"]]["keys"][$K["CONSTRAINT_NAME"]][$K["COLUMN_NAME"]]=$K["REFERENCED_COLUMN_NAME"];foreach($J
as$y=>$X){$B=$this->tableName(table_status($y,true));if($B!=""){$nf=preg_quote($Tf);$N="(:|\\s*-)?\\s+";$J[$y]["name"]=(preg_match("(^$nf$N(.+)|^(.+?)$N$nf\$)iu",$B,$A)?$A[2].$A[3]:$B);}else
unset($J[$y]);}return$J;}function
backwardKeysPrint($Ia,$K){foreach($Ia
as$R=>$Ha){foreach($Ha["keys"]as$eb){$_=ME.'select='.urlencode($R);$s=0;foreach($eb
as$f=>$X)$_.=where_link($s++,$f,$K[$X]);echo"<a href='".h($_)."'>".h($Ha["name"])."</a>";$_=ME.'edit='.urlencode($R);foreach($eb
as$f=>$X)$_.="&set".urlencode("[".bracket_escape($f)."]")."=".urlencode($K[$X]);echo"<a href='".h($_)."' title='".'Nowy rekord'."'>+</a> ";}}}function
selectQuery($G,$Kf,$fc=false){return"<!--\n".str_replace("--","--><!-- ",$G)."\n(".format_time($Kf).")\n-->\n";}function
rowDescription($R){foreach(fields($R)as$p){if(preg_match("~varchar|character varying~",$p["type"]))return
idf_escape($p["field"]);}return"";}function
rowDescriptions($L,$vc){$J=$L;foreach($L[0]as$y=>$X){if(list($R,$t,$B)=$this->_foreignColumn($vc,$y)){$Uc=array();foreach($L
as$K)$Uc[$K[$y]]=q($K[$y]);$_b=$this->_values[$R];if(!$_b)$_b=get_key_vals("SELECT $t, $B FROM ".table($R)." WHERE $t IN (".implode(", ",$Uc).")");foreach($L
as$Wd=>$K){if(isset($K[$y]))$J[$Wd][$y]=(string)$_b[$K[$y]];}}}return$J;}function
selectLink($X,$p){}function
selectVal($X,$_,$p,$re){$J=$X;$_=h($_);if(preg_match('~blob|bytea~',$p["type"])&&!is_utf8($X)){$J=lang(array('%d bajt','%d bajty','%d bajtÃ³w'),strlen($re));if(preg_match("~^(GIF|\xFF\xD8\xFF|\x89PNG\x0D\x0A\x1A\x0A)~",$re))$J="<img src='$_' alt='$J'>";}if(like_bool($p)&&$J!="")$J=(preg_match('~^(1|t|true|y|yes|on)$~i',$X)?'tak':'nie');if($_)$J="<a href='$_'".(is_url($_)?target_blank():"").">$J</a>";if(!$_&&!like_bool($p)&&preg_match(number_type(),$p["type"]))$J="<div class='number'>$J</div>";elseif(preg_match('~date~',$p["type"]))$J="<div class='datetime'>$J</div>";return$J;}function
editVal($X,$p){if(preg_match('~date|timestamp~',$p["type"])&&$X!==null)return
preg_replace('~^(\d{2}(\d+))-(0?(\d+))-(0?(\d+))~','$6.$4.$1',$X);return$X;}function
selectColumnsPrint($M,$g){}function
selectSearchPrint($Z,$g,$w){$Z=(array)$_GET["where"];echo'<fieldset id="fieldset-search"><legend>'.'Szukaj'."</legend><div>\n";$rd=array();foreach($Z
as$y=>$X)$rd[$X["col"]]=$y;$s=0;$q=fields($_GET["select"]);foreach($g
as$B=>$zb){$p=$q[$B];if(preg_match("~enum~",$p["type"])||like_bool($p)){$y=$rd[$B];$s--;echo"<div>".h($zb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'>:",(like_bool($p)?" <select name='where[$s][val]'>".optionlist(array(""=>"",'nie','tak'),$Z[$y]["val"],true)."</select>":enum_input("checkbox"," name='where[$s][val][]'",$p,(array)$Z[$y]["val"],($p["null"]?0:null))),"</div>\n";unset($g[$B]);}elseif(is_array($C=$this->_foreignKeyOptions($_GET["select"],$B))){if($q[$B]["null"])$C[0]='('.'puste'.')';$y=$rd[$B];$s--;echo"<div>".h($zb)."<input type='hidden' name='where[$s][col]' value='".h($B)."'><input type='hidden' name='where[$s][op]' value='='>: <select name='where[$s][val]'>".optionlist($C,$Z[$y]["val"],true)."</select></div>\n";unset($g[$B]);}}$s=0;foreach($Z
as$X){if(($X["col"]==""||$g[$X["col"]])&&"$X[col]$X[val]"!=""){echo"<div><select name='where[$s][col]'><option value=''>(".'gdziekolwiek'.")".optionlist($g,$X["col"],true)."</select>",html_select("where[$s][op]",array(-1=>"")+$this->operators,$X["op"]),"<input type='search' name='where[$s][val]' value='".h($X["val"])."'>".script("mixin(qsl('input'), {onkeydown: selectSearchKeydown, onsearch: selectSearchSearch});","")."</div>\n";$s++;}}echo"<div><select name='where[$s][col]'><option value=''>(".'gdziekolwiek'.")".optionlist($g,null,true)."</select>",script("qsl('select').onchange = selectAddRow;",""),html_select("where[$s][op]",array(-1=>"")+$this->operators),"<input type='search' name='where[$s][val]'></div>",script("mixin(qsl('input'), {onchange: function () { this.parentNode.firstChild.onchange(); }, onsearch: selectSearchSearch});"),"</div></fieldset>\n";}function
selectOrderPrint($pe,$g,$w){$qe=array();foreach($w
as$y=>$v){$pe=array();foreach($v["columns"]as$X)$pe[]=$g[$X];if(count(array_filter($pe,'strlen'))>1&&$y!="PRIMARY")$qe[$y]=implode(", ",$pe);}if($qe){echo'<fieldset><legend>'.'Sortuj'."</legend><div>","<select name='index_order'>".optionlist(array(""=>"")+$qe,($_GET["order"][0]!=""?"":$_GET["index_order"]),true)."</select>","</div></fieldset>\n";}if($_GET["order"])echo"<div style='display: none;'>".hidden_fields(array("order"=>array(1=>reset($_GET["order"])),"desc"=>($_GET["desc"]?array(1=>1):array()),))."</div>\n";}function
selectLimitPrint($z){echo"<fieldset><legend>".'Limit'."</legend><div>";echo
html_select("limit",array("","50","100"),$z),"</div></fieldset>\n";}function
selectLengthPrint($bg){}function
selectActionPrint($w){echo"<fieldset><legend>".'CzynnoÅ›Ä‡'."</legend><div>","<input type='submit' value='".'pokaÅ¼'."'>","</div></fieldset>\n";}function
selectCommandPrint(){return
true;}function
selectImportPrint(){return
true;}function
selectEmailPrint($Ob,$g){if($Ob){print_fieldset("email",'E-mail',$_POST["email_append"]);echo"<div>",script("qsl('div').onkeydown = partialArg(bodyKeydown, 'email');"),"<p>".'Nadawca'.": <input name='email_from' value='".h($_POST?$_POST["email_from"]:$_COOKIE["adminer_email"])."'>\n",'Temat'.": <input name='email_subject' value='".h($_POST["email_subject"])."'>\n","<p><textarea name='email_message' rows='15' cols='75'>".h($_POST["email_message"].($_POST["email_append"]?'{$'."$_POST[email_addition]}":""))."</textarea>\n","<p>".script("qsl('p').onkeydown = partialArg(bodyKeydown, 'email_append');","").html_select("email_addition",$g,$_POST["email_addition"])."<input type='submit' name='email_append' value='".'Dodaj'."'>\n";echo"<p>".'ZaÅ‚Ä…czniki'.": <input type='file' name='email_files[]'>".script("qsl('input').onchange = emailFileChange;"),"<p>".(count($Ob)==1?'<input type="hidden" name="email_field" value="'.h(key($Ob)).'">':html_select("email_field",$Ob)),"<input type='submit' name='email' value='".'WyÅ›lij'."'>".confirm(),"</div>\n","</div></fieldset>\n";}}function
selectColumnsProcess($g,$w){return
array(array(),array());}function
selectSearchProcess($q,$w){$J=array();foreach((array)$_GET["where"]as$y=>$Z){$bb=$Z["col"];$ke=$Z["op"];$X=$Z["val"];if(($y<0?"":$bb).$X!=""){$hb=array();foreach(($bb!=""?array($bb=>$q[$bb]):$q)as$B=>$p){if($bb!=""||is_numeric($X)||!preg_match(number_type(),$p["type"])){$B=idf_escape($B);if($bb!=""&&$p["type"]=="enum")$hb[]=(in_array(0,$X)?"$B IS NULL OR ":"")."$B IN (".implode(", ",array_map('intval',$X)).")";else{$cg=preg_match('~char|text|enum|set~',$p["type"]);$Y=$this->processInput($p,(!$ke&&$cg&&preg_match('~^[^%]+$~',$X)?"%$X%":$X));$hb[]=$B.($Y=="NULL"?" IS".($ke==">="?" NOT":"")." $Y":(in_array($ke,$this->operators)||$ke=="="?" $ke $Y":($cg?" LIKE $Y":" IN (".str_replace(",","', '",$Y).")")));if($y<0&&$X=="0")$hb[]="$B IS NULL";}}}$J[]=($hb?"(".implode(" OR ",$hb).")":"1 = 0");}}return$J;}function
selectOrderProcess($q,$w){$Xc=$_GET["index_order"];if($Xc!="")unset($_GET["order"][1]);if($_GET["order"])return
array(idf_escape(reset($_GET["order"])).($_GET["desc"]?" DESC":""));foreach(($Xc!=""?array($w[$Xc]):$w)as$v){if($Xc!=""||$v["type"]=="INDEX"){$Ic=array_filter($v["descs"]);$zb=false;foreach($v["columns"]as$X){if(preg_match('~date|timestamp~',$q[$X]["type"])){$zb=true;break;}}$J=array();foreach($v["columns"]as$y=>$X)$J[]=idf_escape($X).(($Ic?$v["descs"][$y]:$zb)?" DESC":"");return$J;}}return
array();}function
selectLimitProcess(){return(isset($_GET["limit"])?$_GET["limit"]:"50");}function
selectLengthProcess(){return"100";}function
selectEmailProcess($Z,$vc){if($_POST["email_append"])return
true;if($_POST["email"]){$sf=0;if($_POST["all"]||$_POST["check"]){$p=idf_escape($_POST["email_field"]);$Qf=$_POST["email_subject"];$Pd=$_POST["email_message"];preg_match_all('~\{\$([a-z0-9_]+)\}~i',"$Qf.$Pd",$Jd);$L=get_rows("SELECT DISTINCT $p".($Jd[1]?", ".implode(", ",array_map('idf_escape',array_unique($Jd[1]))):"")." FROM ".table($_GET["select"])." WHERE $p IS NOT NULL AND $p != ''".($Z?" AND ".implode(" AND ",$Z):"").($_POST["all"]?"":" AND ((".implode(") OR (",array_map('where_check',(array)$_POST["check"]))."))"));$q=fields($_GET["select"]);foreach($this->rowDescriptions($L,$vc)as$K){$bf=array('{\\'=>'{');foreach($Jd[1]as$X)$bf['{$'."$X}"]=$this->editVal($K[$X],$q[$X]);$Nb=$K[$_POST["email_field"]];if(is_mail($Nb)&&send_mail($Nb,strtr($Qf,$bf),strtr($Pd,$bf),$_POST["email_from"],$_FILES["email_files"]))$sf++;}}cookie("adminer_email",$_POST["email_from"]);redirect(remove_from_uri(),lang(array('WysÅ‚ano %d e-mail.','WysÅ‚ano %d e-maile.','WysÅ‚ano %d e-maili.'),$sf));}return
false;}function
selectQueryBuild($M,$Z,$Dc,$pe,$z,$D){return"";}function
messageQuery($G,$dg,$fc=false){return" <span class='time'>".@date("H:i:s")."</span><!--\n".str_replace("--","--><!-- ",$G)."\n".($dg?"($dg)\n":"")."-->";}function
editFunctions($p){$J=array();if($p["null"]&&preg_match('~blob~',$p["type"]))$J["NULL"]='puste';$J[""]=($p["null"]||$p["auto_increment"]||like_bool($p)?"":"*");if(preg_match('~date|time~',$p["type"]))$J["now"]='teraz';if(preg_match('~_(md5|sha1)$~i',$p["field"],$A))$J[]=strtolower($A[1]);return$J;}function
editInput($R,$p,$Ca,$Y){if($p["type"]=="enum")return(isset($_GET["select"])?"<label><input type='radio'$Ca value='-1' checked><i>".'bez zmian'."</i></label> ":"").enum_input("radio",$Ca,$p,($Y||isset($_GET["select"])?$Y:0),($p["null"]?"":null));$C=$this->_foreignKeyOptions($R,$p["field"],$Y);if($C!==null)return(is_array($C)?"<select$Ca>".optionlist($C,$Y,true)."</select>":"<input value='".h($Y)."'$Ca class='hidden'>"."<input value='".h($C)."' class='jsonly'>"."<div></div>".script("qsl('input').oninput = partial(whisper, '".ME."script=complete&source=".urlencode($R)."&field=".urlencode($p["field"])."&value=');
qsl('div').onclick = whisperClick;",""));if(like_bool($p))return'<input type="checkbox" value="1"'.(preg_match('~^(1|t|true|y|yes|on)$~i',$Y)?' checked':'')."$Ca>";$Oc="";if(preg_match('~time~',$p["type"]))$Oc='HH:MM:SS';if(preg_match('~date|timestamp~',$p["type"]))$Oc='d.m.[rrrr]'.($Oc?" [$Oc]":"");if($Oc)return"<input value='".h($Y)."'$Ca> ($Oc)";if(preg_match('~_(md5|sha1)$~i',$p["field"]))return"<input type='password' value='".h($Y)."'$Ca>";return'';}function
editHint($R,$p,$Y){return(preg_match('~\s+(\[.*\])$~',($p["comment"]!=""?$p["comment"]:$p["field"]),$A)?h(" $A[1]"):'');}function
processInput($p,$Y,$Bc=""){if($Bc=="now")return"$Bc()";$J=$Y;if(preg_match('~date|timestamp~',$p["type"])&&preg_match('(^'.str_replace('\$1','(?P<p1>\d*)',preg_replace('~(\\\\\\$([2-6]))~','(?P<p\2>\d{1,2})',preg_quote('$6.$4.$1'))).'(.*))',$Y,$A))$J=($A["p1"]!=""?$A["p1"]:($A["p2"]!=""?($A["p2"]<70?20:19).$A["p2"]:gmdate("Y")))."-$A[p3]$A[p4]-$A[p5]$A[p6]".end($A);$J=($p["type"]=="bit"&&preg_match('~^[0-9]+$~',$Y)?$J:q($J));if($Y==""&&like_bool($p))$J="'0'";elseif($Y==""&&($p["null"]||!preg_match('~char|text~',$p["type"])))$J="NULL";elseif(preg_match('~^(md5|sha1)$~',$Bc))$J="$Bc($J)";return
unconvert_field($p,$J);}function
dumpOutput(){return
array();}function
dumpFormat(){return
array('csv'=>'CSV,','csv;'=>'CSV;','tsv'=>'TSV');}function
dumpDatabase($m){}function
dumpTable(){echo"\xef\xbb\xbf";}function
dumpData($R,$Pf,$G){global$h;$I=$h->query($G,1);if($I){while($K=$I->fetch_assoc()){if($Pf=="table"){dump_csv(array_keys($K));$Pf="INSERT";}dump_csv($K);}}}function
dumpFilename($Sc){return
friendly_url($Sc);}function
dumpHeaders($Sc,$Ud=false){$bc="csv";header("Content-Type: text/csv; charset=utf-8");return$bc;}function
importServerPath(){}function
homepage(){return
true;}function
navigation($Td){global$ca;echo'<h1>
',$this->name(),' <span class="version">',$ca,'</span>

</h1>
';if($Td=="auth"){$nc=true;foreach((array)$_SESSION["pwds"]as$Ng=>$xf){foreach($xf[""]as$V=>$F){if($F!==null){if($nc){echo"<ul id='logins'>",script("mixin(qs('#logins'), {onmouseover: menuOver, onmouseout: menuOut});");$nc=false;}echo"<li><a href='".h(auth_url($Ng,"",$V))."'>".($V!=""?h($V):"<i>".'puste'."</i>")."</a>\n";}}}}else{$this->databasesPrint($Td);if($Td!="db"&&$Td!="ns"){$S=table_status('',true);if(!$S)echo"<p class='message'>".'Brak tabel.'."\n";else$this->tablesPrint($S);}}}function
databasesPrint($Td){}function
tablesPrint($T){echo"<ul id='tables'>",script("mixin(qs('#tables'), {onmouseover: menuOver, onmouseout: menuOut});");foreach($T
as$K){echo'<li>';$B=$this->tableName($K);if(isset($K["Engine"])&&$B!="")echo"<a href='".h(ME).'select='.urlencode($K["Name"])."'".bold($_GET["select"]==$K["Name"]||$_GET["edit"]==$K["Name"],"select")." title='".'PokaÅ¼ dane'."'>$B</a>\n";}echo"</ul>\n";}function
_foreignColumn($vc,$f){foreach((array)$vc[$f]as$uc){if(count($uc["source"])==1){$B=$this->rowDescription($uc["table"]);if($B!=""){$t=idf_escape($uc["target"][0]);return
array($uc["table"],$t,$B);}}}}function
_foreignKeyOptions($R,$f,$Y=null){global$h;if(list($Yf,$t,$B)=$this->_foreignColumn(column_foreign_keys($R),$f)){$J=&$this->_values[$Yf];if($J===null){$S=table_status($Yf);$J=($S["Rows"]>1000?"":array(""=>"")+get_key_vals("SELECT $t, $B FROM ".table($Yf)." ORDER BY 2"));}if(!$J&&$Y!==null)return$h->result("SELECT $B FROM ".table($Yf)." WHERE $t = ".q($Y));return$J;}}}$b=(function_exists('adminer_object')?adminer_object():new
Adminer);function
page_header($gg,$o="",$Qa=array(),$hg=""){global$ba,$ca,$b,$Fb,$x;page_headers();if(is_ajax()&&$o){page_messages($o);exit;}$ig=$gg.($hg!=""?": $hg":"");$jg=strip_tags($ig.(SERVER!=""&&SERVER!="localhost"?h(" - ".SERVER):"")." - ".$b->name());echo'<!DOCTYPE html>
<html lang="pl" dir="ltr">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta name="robots" content="noindex">
<title>',$jg,'</title>
<link rel="stylesheet" type="text/css" href="',h(preg_replace("~\\?.*~","",ME)."?file=default.css&version="),'">
',script_src(preg_replace("~\\?.*~","",ME)."?file=functions.js&version=");if($b->head()){echo'<link rel="shortcut icon" type="image/x-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version="),'">
<link rel="apple-touch-icon" href="',h(preg_replace("~\\?.*~","",ME)."?file=favicon.ico&version="),'">
';foreach($b->css()as$rb){echo'<link rel="stylesheet" type="text/css" href="',h($rb),'">
';}}echo'
<body class="ltr nojs">
';$r=get_temp_dir()."/adminer.version";if(!$_COOKIE["adminer_version"]&&function_exists('openssl_verify')&&file_exists($r)&&filemtime($r)+86400>time()){$Og=unserialize(file_get_contents($r));$Oe="-----BEGIN PUBLIC KEY-----
MIIBIjANBgkqhkiG9w0BAQEFAAOCAQ8AMIIBCgKCAQEAwqWOVuF5uw7/+Z70djoK
RlHIZFZPO0uYRezq90+7Amk+FDNd7KkL5eDve+vHRJBLAszF/7XKXe11xwliIsFs
DFWQlsABVZB3oisKCBEuI71J4kPH8dKGEWR9jDHFw3cWmoH3PmqImX6FISWbG3B8
h7FIx3jEaw5ckVPVTeo5JRm/1DZzJxjyDenXvBQ/6o9DgZKeNDgxwKzH+sw9/YCO
jHnq1cFpOIISzARlrHMa/43YfeNRAm/tsBXjSxembBPo7aQZLAWHmaj5+K19H10B
nCpz9Y++cipkVEiKRGih4ZEvjoFysEOdRLj6WiD/uUNky4xGeA6LaJqh5XpkFkcQ
fQIDAQAB
-----END PUBLIC KEY-----
";if(openssl_verify($Og["version"],base64_decode($Og["signature"]),$Oe)==1)$_COOKIE["adminer_version"]=$Og["version"];}echo'<script',nonce(),'>
mixin(document.body, {onkeydown: bodyKeydown, onclick: bodyClick',(isset($_COOKIE["adminer_version"])?"":", onload: partial(verifyVersion, '$ca', '".js_escape(ME)."', '".get_token()."')");?>});
document.body.className = document.body.className.replace(/ nojs/, ' js');
var offlineMessage = '<?php echo
js_escape('JesteÅ› offline.'),'\';
var thousandsSeparator = \'',js_escape(' '),'\';
</script>

<div id="help" class="jush-',$x,' jsonly hidden"></div>
',script("mixin(qs('#help'), {onmouseover: function () { helpOpen = 1; }, onmouseout: helpMouseout});"),'
<div id="content">
';if($Qa!==null){$_=substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1);echo'<p id="breadcrumb"><a href="'.h($_?$_:".").'">'.$Fb[DRIVER].'</a> &raquo; ';$_=substr(preg_replace('~\b(db|ns)=[^&]*&~','',ME),0,-1);$O=$b->serverName(SERVER);$O=($O!=""?$O:'Serwer');if($Qa===false)echo"$O\n";else{echo"<a href='".($_?h($_):".")."' accesskey='1' title='Alt+Shift+1'>$O</a> &raquo; ";if($_GET["ns"]!=""||(DB!=""&&is_array($Qa)))echo'<a href="'.h($_."&db=".urlencode(DB).(support("scheme")?"&ns=":"")).'">'.h(DB).'</a> &raquo; ';if(is_array($Qa)){if($_GET["ns"]!="")echo'<a href="'.h(substr(ME,0,-1)).'">'.h($_GET["ns"]).'</a> &raquo; ';foreach($Qa
as$y=>$X){$zb=(is_array($X)?$X[1]:h($X));if($zb!="")echo"<a href='".h(ME."$y=").urlencode(is_array($X)?$X[0]:$X)."'>$zb</a> &raquo; ";}}echo"$gg\n";}}echo"<h2>$ig</h2>\n","<div id='ajaxstatus' class='jsonly hidden'></div>\n";restart_session();page_messages($o);$l=&get_session("dbs");if(DB!=""&&$l&&!in_array(DB,$l,true))$l=null;stop_session();define("PAGE_HEADER",1);}function
page_headers(){global$b;header("Content-Type: text/html; charset=utf-8");header("Cache-Control: no-cache");header("X-Frame-Options: deny");header("X-XSS-Protection: 0");header("X-Content-Type-Options: nosniff");header("Referrer-Policy: origin-when-cross-origin");foreach($b->csp()as$qb){$Lc=array();foreach($qb
as$y=>$X)$Lc[]="$y $X";header("Content-Security-Policy: ".implode("; ",$Lc));}$b->headers();}function
csp(){return
array(array("script-src"=>"'self' 'unsafe-inline' 'nonce-".get_nonce()."' 'strict-dynamic'","connect-src"=>"'self'","frame-src"=>"","object-src"=>"'none'","base-uri"=>"'none'","form-action"=>"'self'",),);}function
get_nonce(){static$ae;if(!$ae)$ae=base64_encode(rand_string());return$ae;}function
page_messages($o){$Gg=preg_replace('~^[^?]*~','',$_SERVER["REQUEST_URI"]);$Qd=$_SESSION["messages"][$Gg];if($Qd){echo"<div class='message'>".implode("</div>\n<div class='message'>",$Qd)."</div>".script("messagesPrint();");unset($_SESSION["messages"][$Gg]);}if($o)echo"<div class='error'>$o</div>\n";}function
page_footer($Td=""){global$b,$mg;echo'</div>

';if($Td!="auth"){echo'<form action="" method="post">
<p class="logout">
<input type="submit" name="logout" value="Wyloguj" id="logout">
<input type="hidden" name="token" value="',$mg,'">
</p>
</form>
';}echo'<div id="menu">
';$b->navigation($Td);echo'</div>
',script("setupSubmitHighlight(document);");}function
int32($Wd){while($Wd>=2147483648)$Wd-=4294967296;while($Wd<=-2147483649)$Wd+=4294967296;return(int)$Wd;}function
long2str($W,$Sg){$kf='';foreach($W
as$X)$kf.=pack('V',$X);if($Sg)return
substr($kf,0,end($W));return$kf;}function
str2long($kf,$Sg){$W=array_values(unpack('V*',str_pad($kf,4*ceil(strlen($kf)/4),"\0")));if($Sg)$W[]=strlen($kf);return$W;}function
xxtea_mx($dh,$ch,$Sf,$nd){return
int32((($dh>>5&0x7FFFFFF)^$ch<<2)+(($ch>>3&0x1FFFFFFF)^$dh<<4))^int32(($Sf^$ch)+($nd^$dh));}function
encrypt_string($Nf,$y){if($Nf=="")return"";$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Nf,true);$Wd=count($W)-1;$dh=$W[$Wd];$ch=$W[0];$Pe=floor(6+52/($Wd+1));$Sf=0;while($Pe-->0){$Sf=int32($Sf+0x9E3779B9);$Jb=$Sf>>2&3;for($ue=0;$ue<$Wd;$ue++){$ch=$W[$ue+1];$Vd=xxtea_mx($dh,$ch,$Sf,$y[$ue&3^$Jb]);$dh=int32($W[$ue]+$Vd);$W[$ue]=$dh;}$ch=$W[0];$Vd=xxtea_mx($dh,$ch,$Sf,$y[$ue&3^$Jb]);$dh=int32($W[$Wd]+$Vd);$W[$Wd]=$dh;}return
long2str($W,false);}function
decrypt_string($Nf,$y){if($Nf=="")return"";if(!$y)return
false;$y=array_values(unpack("V*",pack("H*",md5($y))));$W=str2long($Nf,false);$Wd=count($W)-1;$dh=$W[$Wd];$ch=$W[0];$Pe=floor(6+52/($Wd+1));$Sf=int32($Pe*0x9E3779B9);while($Sf){$Jb=$Sf>>2&3;for($ue=$Wd;$ue>0;$ue--){$dh=$W[$ue-1];$Vd=xxtea_mx($dh,$ch,$Sf,$y[$ue&3^$Jb]);$ch=int32($W[$ue]-$Vd);$W[$ue]=$ch;}$dh=$W[$Wd];$Vd=xxtea_mx($dh,$ch,$Sf,$y[$ue&3^$Jb]);$ch=int32($W[0]-$Vd);$W[0]=$ch;$Sf=int32($Sf-0x9E3779B9);}return
long2str($W,true);}$h='';$Kc=$_SESSION["token"];if(!$Kc)$_SESSION["token"]=rand(1,1e6);$mg=get_token();$Ce=array();if($_COOKIE["adminer_permanent"]){foreach(explode(" ",$_COOKIE["adminer_permanent"])as$X){list($y)=explode(":",$X);$Ce[$y]=$X;}}function
add_invalid_login(){global$b;$_c=file_open_lock(get_temp_dir()."/adminer.invalid");if(!$_c)return;$jd=unserialize(stream_get_contents($_c));$dg=time();if($jd){foreach($jd
as$kd=>$X){if($X[0]<$dg)unset($jd[$kd]);}}$id=&$jd[$b->bruteForceKey()];if(!$id)$id=array($dg+30*60,0);$id[1]++;file_write_unlock($_c,serialize($jd));}function
check_invalid_login(){global$b;$jd=unserialize(@file_get_contents(get_temp_dir()."/adminer.invalid"));$id=$jd[$b->bruteForceKey()];$Zd=($id[1]>29?$id[0]-time():0);if($Zd>0)auth_error(lang(array('Za duÅ¼o nieudanych prÃ³b logowania, sprÃ³buj ponownie za %d minutÄ™.','Za duÅ¼o nieudanych prÃ³b logowania, sprÃ³buj ponownie za %d minuty.','Za duÅ¼o nieudanych prÃ³b logowania, sprÃ³buj ponownie za %d minut.'),ceil($Zd/60)));}$Da=$_POST["auth"];if($Da){session_regenerate_id();$Ng=$Da["driver"];$O=$Da["server"];$V=$Da["username"];$F=(string)$Da["password"];$m=$Da["db"];set_password($Ng,$O,$V,$F);$_SESSION["db"][$Ng][$O][$V][$m]=true;if($Da["permanent"]){$y=base64_encode($Ng)."-".base64_encode($O)."-".base64_encode($V)."-".base64_encode($m);$Le=$b->permanentLogin(true);$Ce[$y]="$y:".base64_encode($Le?encrypt_string($F,$Le):"");cookie("adminer_permanent",implode(" ",$Ce));}if(count($_POST)==1||DRIVER!=$Ng||SERVER!=$O||$_GET["username"]!==$V||DB!=$m)redirect(auth_url($Ng,$O,$V,$m));}elseif($_POST["logout"]){if($Kc&&!verify_token()){page_header('Wyloguj','NieprawidÅ‚owy token CSRF. SprÃ³buj wysÅ‚aÄ‡ formularz ponownie.');page_footer("db");exit;}else{foreach(array("pwds","db","dbs","queries")as$y)set_session($y,null);unset_permanent();redirect(substr(preg_replace('~\b(username|db|ns)=[^&]*&~','',ME),0,-1),'Wylogowano pomyÅ›lnie.'.' '.'DziÄ™kujemy za korzystanie z naszej strony</a>.');}}elseif($Ce&&!$_SESSION["pwds"]){session_regenerate_id();$Le=$b->permanentLogin();foreach($Ce
as$y=>$X){list(,$Ya)=explode(":",$X);list($Ng,$O,$V,$m)=array_map('base64_decode',explode("-",$y));set_password($Ng,$O,$V,decrypt_string(base64_decode($Ya),$Le));$_SESSION["db"][$Ng][$O][$V][$m]=true;}}function
unset_permanent(){global$Ce;foreach($Ce
as$y=>$X){list($Ng,$O,$V,$m)=array_map('base64_decode',explode("-",$y));if($Ng==DRIVER&&$O==SERVER&&$V==$_GET["username"]&&$m==DB)unset($Ce[$y]);}cookie("adminer_permanent",implode(" ",$Ce));}function
auth_error($o){global$b,$Kc;$yf=session_name();if(isset($_GET["username"])){header("HTTP/1.1 403 Forbidden");if(($_COOKIE[$yf]||$_GET[$yf])&&!$Kc)$o='Sesja wygasÅ‚a, zaloguj siÄ™ ponownie.';else{restart_session();add_invalid_login();$F=get_password();if($F!==null){if($F===false)$o.='<br>'.sprintf('WaÅ¼noÅ›Ä‡ hasÅ‚a gÅ‚Ã³wnego wygasÅ‚a. <a href=""%s>Zaimplementuj</a> wÅ‚asnÄ… metodÄ™ %s, aby ustawiÄ‡ je na staÅ‚e.',target_blank(),'<code>permanentLogin()</code>');set_password(DRIVER,SERVER,$_GET["username"],null);}unset_permanent();}}if(!$_COOKIE[$yf]&&$_GET[$yf]&&ini_bool("session.use_only_cookies"))$o='Wymagana jest obsÅ‚uga sesji w PHP.';$E=session_get_cookie_params();cookie("adminer_key",($_COOKIE["adminer_key"]?$_COOKIE["adminer_key"]:rand_string()),$E["lifetime"]);page_header('Zaloguj siÄ™',$o,null);echo"<form action='' method='post'>\n","<div>";if(hidden_fields($_POST,array("auth")))echo"<p class='message'>".'The action will be performed after successful login with the same credentials.'."\n";echo"</div>\n";$b->loginForm();echo"</form>\n";page_footer("auth");exit;}if(isset($_GET["username"])&&!class_exists("Min_DB")){unset($_SESSION["pwds"][DRIVER]);unset_permanent();page_header('Brak rozszerzenia',sprintf('Å»adne z rozszerzeÅ„ PHP umoÅ¼liwiajÄ…cych poÅ‚Ä…czenie siÄ™ z bazÄ… danych (%s) nie jest dostÄ™pne.',implode(", ",$Ge)),false);page_footer("auth");exit;}stop_session(true);if(isset($_GET["username"])){list($Qc,$Ee)=explode(":",SERVER,2);if(is_numeric($Ee)&&$Ee<1024)auth_error('ÅÄ…czenie do portÃ³w uprzywilejowanych jest niedozwolone.');check_invalid_login();$h=connect();$n=new
Min_Driver($h);}$Dd=null;if(!is_object($h)||($Dd=$b->login($_GET["username"],get_password()))!==true){$o=(is_string($h)?h($h):(is_string($Dd)?$Dd:'NieprawidÅ‚owe dane logowania.'));auth_error($o.(preg_match('~^ | $~',get_password())?'<br>'.'There is a space in the input password which might be the cause.':''));}if($Da&&$_POST["token"])$_POST["token"]=$mg;$o='';if($_POST){if(!verify_token()){$ed="max_input_vars";$Nd=ini_get($ed);if(extension_loaded("suhosin")){foreach(array("suhosin.request.max_vars","suhosin.post.max_vars")as$y){$X=ini_get($y);if($X&&(!$Nd||$X<$Nd)){$ed=$y;$Nd=$X;}}}$o=(!$_POST["token"]&&$Nd?sprintf('Przekroczono maksymalnÄ… liczbÄ™ pÃ³l. ZwiÄ™ksz %s.',"'$ed'"):'NieprawidÅ‚owy token CSRF. SprÃ³buj wysÅ‚aÄ‡ formularz ponownie.'.' '.'JeÅ¼eli nie wywoÅ‚aÅ‚eÅ› tej strony z Adminera, zamknij to okno.');}}elseif($_SERVER["REQUEST_METHOD"]=="POST"){$o=sprintf('PrzesÅ‚ano zbyt duÅ¼o danych. Zmniejsz objÄ™toÅ›Ä‡ danych lub zwiÄ™ksz zmiennÄ… konfiguracyjnÄ… %s.',"'post_max_size'");if(isset($_GET["sql"]))$o.=' '.'WiÄ™ksze pliki SQL moÅ¼esz wgraÄ‡ na serwer poprzez FTP przed zaimportowaniem.';}function
email_header($Lc){return"=?UTF-8?B?".base64_encode($Lc)."?=";}function
send_mail($Nb,$Qf,$Pd,$Ac="",$lc=array()){$Tb=(DIRECTORY_SEPARATOR=="/"?"\n":"\r\n");$Pd=str_replace("\n",$Tb,wordwrap(str_replace("\r","","$Pd\n")));$Pa=uniqid("boundary");$Aa="";foreach((array)$lc["error"]as$y=>$X){if(!$X)$Aa.="--$Pa$Tb"."Content-Type: ".str_replace("\n","",$lc["type"][$y]).$Tb."Content-Disposition: attachment; filename=\"".preg_replace('~["\n]~','',$lc["name"][$y])."\"$Tb"."Content-Transfer-Encoding: base64$Tb$Tb".chunk_split(base64_encode(file_get_contents($lc["tmp_name"][$y])),76,$Tb).$Tb;}$Ka="";$Mc="Content-Type: text/plain; charset=utf-8$Tb"."Content-Transfer-Encoding: 8bit";if($Aa){$Aa.="--$Pa--$Tb";$Ka="--$Pa$Tb$Mc$Tb$Tb";$Mc="Content-Type: multipart/mixed; boundary=\"$Pa\"";}$Mc.=$Tb."MIME-Version: 1.0$Tb"."X-Mailer: Adminer Editor".($Ac?$Tb."From: ".str_replace("\n","",$Ac):"");return
mail($Nb,email_header($Qf),$Ka.$Pd.$Aa,$Mc);}function
like_bool($p){return
preg_match("~bool|(tinyint|bit)\\(1\\)~",$p["full_type"]);}$h->select_db($b->database());$he="RESTRICT|NO ACTION|CASCADE|SET NULL|SET DEFAULT";$Fb[DRIVER]='Zaloguj siÄ™';if(isset($_GET["select"])&&($_POST["edit"]||$_POST["clone"])&&!$_POST["save"])$_GET["edit"]=$_GET["select"];if(isset($_GET["download"])){$a=$_GET["download"];$q=fields($a);header("Content-Type: application/octet-stream");header("Content-Disposition: attachment; filename=".friendly_url("$a-".implode("_",$_GET["where"])).".".friendly_url($_GET["field"]));$M=array(idf_escape($_GET["field"]));$I=$n->select($a,$M,array(where($_GET,$q)),$M);$K=($I?$I->fetch_row():array());echo$n->value($K[0],$q[$_GET["field"]]);exit;}elseif(isset($_GET["edit"])){$a=$_GET["edit"];$q=fields($a);$Z=(isset($_GET["select"])?($_POST["check"]&&count($_POST["check"])==1?where_check($_POST["check"][0],$q):""):where($_GET,$q));$Fg=(isset($_GET["select"])?$_POST["edit"]:$Z);foreach($q
as$B=>$p){if(!isset($p["privileges"][$Fg?"update":"insert"])||$b->fieldName($p)=="")unset($q[$B]);}if($_POST&&!$o&&!isset($_GET["select"])){$Cd=$_POST["referer"];if($_POST["insert"])$Cd=($Fg?null:$_SERVER["REQUEST_URI"]);elseif(!preg_match('~^.+&select=.+$~',$Cd))$Cd=ME."select=".urlencode($a);$w=indexes($a);$Ag=unique_array($_GET["where"],$w);$Re="\nWHERE $Z";if(isset($_POST["delete"]))queries_redirect($Cd,'Rekord zostaÅ‚ usuniÄ™ty.',$n->delete($a,$Re,!$Ag));else{$P=array();foreach($q
as$B=>$p){$X=process_input($p);if($X!==false&&$X!==null)$P[idf_escape($B)]=$X;}if($Fg){if(!$P)redirect($Cd);queries_redirect($Cd,'Rekord zostaÅ‚ zaktualizowany.',$n->update($a,$P,$Re,!$Ag));if(is_ajax()){page_headers();page_messages($o);exit;}}else{$I=$n->insert($a,$P);$xd=($I?last_id():0);queries_redirect($Cd,sprintf('Rekord%s zostaÅ‚ dodany.',($xd?" $xd":"")),$I);}}}$K=null;if($_POST["save"])$K=(array)$_POST["fields"];elseif($Z){$M=array();foreach($q
as$B=>$p){if(isset($p["privileges"]["select"])){$za=convert_field($p);if($_POST["clone"]&&$p["auto_increment"])$za="''";if($x=="sql"&&preg_match("~enum|set~",$p["type"]))$za="1*".idf_escape($B);$M[]=($za?"$za AS ":"").idf_escape($B);}}$K=array();if(!support("table"))$M=array("*");if($M){$I=$n->select($a,$M,array($Z),$M,array(),(isset($_GET["select"])?2:1));if(!$I)$o=error();else{$K=$I->fetch_assoc();if(!$K)$K=false;}if(isset($_GET["select"])&&(!$K||$I->fetch_assoc()))$K=null;}}if(!support("table")&&!$q){if(!$Z){$I=$n->select($a,array("*"),$Z,array("*"));$K=($I?$I->fetch_assoc():false);if(!$K)$K=array($n->primary=>"");}if($K){foreach($K
as$y=>$X){if(!$Z)$K[$y]=null;$q[$y]=array("field"=>$y,"null"=>($y!=$n->primary),"auto_increment"=>($y==$n->primary));}}}edit_form($a,$q,$K,$Fg);}elseif(isset($_GET["select"])){$a=$_GET["select"];$S=table_status1($a);$w=indexes($a);$q=fields($a);$xc=column_foreign_keys($a);$ge=$S["Oid"];parse_str($_COOKIE["adminer_import"],$sa);$if=array();$g=array();$bg=null;foreach($q
as$y=>$p){$B=$b->fieldName($p);if(isset($p["privileges"]["select"])&&$B!=""){$g[$y]=html_entity_decode(strip_tags($B),ENT_QUOTES);if(is_shortable($p))$bg=$b->selectLengthProcess();}$if+=$p["privileges"];}list($M,$Dc)=$b->selectColumnsProcess($g,$w);$ld=count($Dc)<count($M);$Z=$b->selectSearchProcess($q,$w);$pe=$b->selectOrderProcess($q,$w);$z=$b->selectLimitProcess();if($_GET["val"]&&is_ajax()){header("Content-Type: text/plain; charset=utf-8");foreach($_GET["val"]as$Bg=>$K){$za=convert_field($q[key($K)]);$M=array($za?$za:idf_escape(key($K)));$Z[]=where_check($Bg,$q);$J=$n->select($a,$M,$Z,$M);if($J)echo
reset($J->fetch_row());}exit;}$Ie=$Dg=null;foreach($w
as$v){if($v["type"]=="PRIMARY"){$Ie=array_flip($v["columns"]);$Dg=($M?$Ie:array());foreach($Dg
as$y=>$X){if(in_array(idf_escape($y),$M))unset($Dg[$y]);}break;}}if($ge&&!$Ie){$Ie=$Dg=array($ge=>0);$w[]=array("type"=>"PRIMARY","columns"=>array($ge));}if($_POST&&!$o){$Xg=$Z;if(!$_POST["all"]&&is_array($_POST["check"])){$Wa=array();foreach($_POST["check"]as$Ta)$Wa[]=where_check($Ta,$q);$Xg[]="((".implode(") OR (",$Wa)."))";}$Xg=($Xg?"\nWHERE ".implode(" AND ",$Xg):"");if($_POST["export"]){cookie("adminer_import","output=".urlencode($_POST["output"])."&format=".urlencode($_POST["format"]));dump_headers($a);$b->dumpTable($a,"");$Ac=($M?implode(", ",$M):"*").convert_fields($g,$q,$M)."\nFROM ".table($a);$Fc=($Dc&&$ld?"\nGROUP BY ".implode(", ",$Dc):"").($pe?"\nORDER BY ".implode(", ",$pe):"");if(!is_array($_POST["check"])||$Ie)$G="SELECT $Ac$Xg$Fc";else{$_g=array();foreach($_POST["check"]as$X)$_g[]="(SELECT".limit($Ac,"\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q).$Fc,1).")";$G=implode(" UNION ALL ",$_g);}$b->dumpData($a,"table",$G);exit;}if(!$b->selectEmailProcess($Z,$xc)){if($_POST["save"]||$_POST["delete"]){$I=true;$ta=0;$P=array();if(!$_POST["delete"]){foreach($g
as$B=>$X){$X=process_input($q[$B]);if($X!==null&&($_POST["clone"]||$X!==false))$P[idf_escape($B)]=($X!==false?$X:idf_escape($B));}}if($_POST["delete"]||$P){if($_POST["clone"])$G="INTO ".table($a)." (".implode(", ",array_keys($P)).")\nSELECT ".implode(", ",$P)."\nFROM ".table($a);if($_POST["all"]||($Ie&&is_array($_POST["check"]))||$ld){$I=($_POST["delete"]?$n->delete($a,$Xg):($_POST["clone"]?queries("INSERT $G$Xg"):$n->update($a,$P,$Xg)));$ta=$h->affected_rows;}else{foreach((array)$_POST["check"]as$X){$Tg="\nWHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($X,$q);$I=($_POST["delete"]?$n->delete($a,$Tg,1):($_POST["clone"]?queries("INSERT".limit1($a,$G,$Tg)):$n->update($a,$P,$Tg,1)));if(!$I)break;$ta+=$h->affected_rows;}}}$Pd=lang(array('Zmieniono %d rekord.','Zmieniono %d rekordy.','Zmieniono %d rekordÃ³w.'),$ta);if($_POST["clone"]&&$I&&$ta==1){$xd=last_id();if($xd)$Pd=sprintf('Rekord%s zostaÅ‚ dodany.'," $xd");}queries_redirect(remove_from_uri($_POST["all"]&&$_POST["delete"]?"page":""),$Pd,$I);if(!$_POST["delete"]){edit_form($a,$q,(array)$_POST["fields"],!$_POST["clone"]);page_footer();exit;}}elseif(!$_POST["import"]){if(!$_POST["val"])$o='Ctrl+kliknij wartoÅ›Ä‡, aby jÄ… edytowaÄ‡.';else{$I=true;$ta=0;foreach($_POST["val"]as$Bg=>$K){$P=array();foreach($K
as$y=>$X){$y=bracket_escape($y,1);$P[idf_escape($y)]=(preg_match('~char|text~',$q[$y]["type"])||$X!=""?$b->processInput($q[$y],$X):"NULL");}$I=$n->update($a,$P," WHERE ".($Z?implode(" AND ",$Z)." AND ":"").where_check($Bg,$q),!$ld&&!$Ie," ");if(!$I)break;$ta+=$h->affected_rows;}queries_redirect(remove_from_uri(),lang(array('Zmieniono %d rekord.','Zmieniono %d rekordy.','Zmieniono %d rekordÃ³w.'),$ta),$I);}}elseif(!is_string($kc=get_file("csv_file",true)))$o=upload_error($kc);elseif(!preg_match('~~u',$kc))$o='Kodowanie pliku musi byÄ‡ ustawione na UTF-8.';else{cookie("adminer_import","output=".urlencode($sa["output"])."&format=".urlencode($_POST["separator"]));$I=true;$eb=array_keys($q);preg_match_all('~(?>"[^"]*"|[^"\r\n]+)+~',$kc,$Jd);$ta=count($Jd[0]);$n->begin();$N=($_POST["separator"]=="csv"?",":($_POST["separator"]=="tsv"?"\t":";"));$L=array();foreach($Jd[0]as$y=>$X){preg_match_all("~((?>\"[^\"]*\")+|[^$N]*)$N~",$X.$N,$Kd);if(!$y&&!array_diff($Kd[1],$eb)){$eb=$Kd[1];$ta--;}else{$P=array();foreach($Kd[1]as$s=>$bb)$P[idf_escape($eb[$s])]=($bb==""&&$q[$eb[$s]]["null"]?"NULL":q(str_replace('""','"',preg_replace('~^"|"$~','',$bb))));$L[]=$P;}}$I=(!$L||$n->insertUpdate($a,$L,$Ie));if($I)$I=$n->commit();queries_redirect(remove_from_uri("page"),lang(array('%d rekord zostaÅ‚ zaimportowany.','%d rekordy zostaÅ‚y zaimportowane.','%d rekordÃ³w zostaÅ‚o zaimportowanych.'),$ta),$I);$n->rollback();}}}$Vf=$b->tableName($S);if(is_ajax()){page_headers();ob_start();}else
page_header('pokaÅ¼'.": $Vf",$o);$P=null;if(isset($if["insert"])||!support("table")){$P="";foreach((array)$_GET["where"]as$X){if($xc[$X["col"]]&&count($xc[$X["col"]])==1&&($X["op"]=="="||(!$X["op"]&&!preg_match('~[_%]~',$X["val"]))))$P.="&set".urlencode("[".bracket_escape($X["col"])."]")."=".urlencode($X["val"]);}}$b->selectLinks($S,$P);if(!$g&&support("table"))echo"<p class='error'>".'Nie udaÅ‚o siÄ™ pobraÄ‡ danych z tabeli'.($q?".":": ".error())."\n";else{echo"<form action='' id='form'>\n","<div style='display: none;'>";hidden_fields_get();echo(DB!=""?'<input type="hidden" name="db" value="'.h(DB).'">'.(isset($_GET["ns"])?'<input type="hidden" name="ns" value="'.h($_GET["ns"]).'">':""):"");echo'<input type="hidden" name="select" value="'.h($a).'">',"</div>\n";$b->selectColumnsPrint($M,$g);$b->selectSearchPrint($Z,$g,$w);$b->selectOrderPrint($pe,$g,$w);$b->selectLimitPrint($z);$b->selectLengthPrint($bg);$b->selectActionPrint($w);echo"</form>\n";$D=$_GET["page"];if($D=="last"){$zc=$h->result(count_rows($a,$Z,$ld,$Dc));$D=floor(max(0,$zc-1)/$z);}$pf=$M;$Ec=$Dc;if(!$pf){$pf[]="*";$mb=convert_fields($g,$q,$M);if($mb)$pf[]=substr($mb,2);}foreach($M
as$y=>$X){$p=$q[idf_unescape($X)];if($p&&($za=convert_field($p)))$pf[$y]="$za AS $X";}if(!$ld&&$Dg){foreach($Dg
as$y=>$X){$pf[]=idf_escape($y);if($Ec)$Ec[]=idf_escape($y);}}$I=$n->select($a,$pf,$Z,$Ec,$pe,$z,$D,true);if(!$I)echo"<p class='error'>".error()."\n";else{if($x=="mssql"&&$D)$I->seek($z*$D);$Pb=array();echo"<form action='' method='post' enctype='multipart/form-data'>\n";$L=array();while($K=$I->fetch_assoc()){if($D&&$x=="oracle")unset($K["RNUM"]);$L[]=$K;}if($_GET["page"]!="last"&&$z!=""&&$Dc&&$ld&&$x=="sql")$zc=$h->result(" SELECT FOUND_ROWS()");if(!$L)echo"<p class='message'>".'Brak rekordÃ³w.'."\n";else{$Ja=$b->backwardKeys($a,$Vf);echo"<div class='scrollable'>","<table id='table' cellspacing='0' class='nowrap checkable'>",script("mixin(qs('#table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true), onkeydown: editingKeydown});"),"<thead><tr>".(!$Dc&&$M?"":"<td><input type='checkbox' id='all-page' class='jsonly'>".script("qs('#all-page').onclick = partial(formCheck, /check/);","")." <a href='".h($_GET["modify"]?remove_from_uri("modify"):$_SERVER["REQUEST_URI"]."&modify=1")."'>".'ZmieÅ„'."</a>");$Xd=array();$Cc=array();reset($M);$Te=1;foreach($L[0]as$y=>$X){if(!isset($Dg[$y])){$X=$_GET["columns"][key($M)];$p=$q[$M?($X?$X["col"]:current($M)):$y];$B=($p?$b->fieldName($p,$Te):($X["fun"]?"*":$y));if($B!=""){$Te++;$Xd[$y]=$B;$f=idf_escape($y);$Rc=remove_from_uri('(order|desc)[^=]*|page').'&order%5B0%5D='.urlencode($y);$zb="&desc%5B0%5D=1";echo"<th>".script("mixin(qsl('th'), {onmouseover: partial(columnMouse), onmouseout: partial(columnMouse, ' hidden')});",""),'<a href="'.h($Rc.($pe[0]==$f||$pe[0]==$y||(!$pe&&$ld&&$Dc[0]==$f)?$zb:'')).'">';echo
apply_sql_function($X["fun"],$B)."</a>";echo"<span class='column hidden'>","<a href='".h($Rc.$zb)."' title='".'malejÄ…co'."' class='text'> â†“</a>";if(!$X["fun"]){echo'<a href="#fieldset-search" title="'.'Szukaj'.'" class="text jsonly"> =</a>',script("qsl('a').onclick = partial(selectSearch, '".js_escape($y)."');");}echo"</span>";}$Cc[$y]=$X["fun"];next($M);}}$_d=array();if($_GET["modify"]){foreach($L
as$K){foreach($K
as$y=>$X)$_d[$y]=max($_d[$y],min(40,strlen(utf8_decode($X))));}}echo($Ja?"<th>".'Relacje':"")."</thead>\n";if(is_ajax()){if($z%2==1&&$D%2==1)odd();ob_end_clean();}foreach($b->rowDescriptions($L,$xc)as$Wd=>$K){$Ag=unique_array($L[$Wd],$w);if(!$Ag){$Ag=array();foreach($L[$Wd]as$y=>$X){if(!preg_match('~^(COUNT\((\*|(DISTINCT )?`(?:[^`]|``)+`)\)|(AVG|GROUP_CONCAT|MAX|MIN|SUM)\(`(?:[^`]|``)+`\))$~',$y))$Ag[$y]=$X;}}$Bg="";foreach($Ag
as$y=>$X){if(($x=="sql"||$x=="pgsql")&&preg_match('~char|text|enum|set~',$q[$y]["type"])&&strlen($X)>64){$y=(strpos($y,'(')?$y:idf_escape($y));$y="MD5(".($x!='sql'||preg_match("~^utf8~",$q[$y]["collation"])?$y:"CONVERT($y USING ".charset($h).")").")";$X=md5($X);}$Bg.="&".($X!==null?urlencode("where[".bracket_escape($y)."]")."=".urlencode($X):"null%5B%5D=".urlencode($y));}echo"<tr".odd().">".(!$Dc&&$M?"":"<td>".checkbox("check[]",substr($Bg,1),in_array(substr($Bg,1),(array)$_POST["check"])).($ld||information_schema(DB)?"":" <a href='".h(ME."edit=".urlencode($a).$Bg)."' class='edit'>".'edytuj'."</a>"));foreach($K
as$y=>$X){if(isset($Xd[$y])){$p=$q[$y];$X=$n->value($X,$p);if($X!=""&&(!isset($Pb[$y])||$Pb[$y]!=""))$Pb[$y]=(is_mail($X)?$Xd[$y]:"");$_="";if(preg_match('~blob|bytea|raw|file~',$p["type"])&&$X!="")$_=ME.'download='.urlencode($a).'&field='.urlencode($y).$Bg;if(!$_&&$X!==null){foreach((array)$xc[$y]as$wc){if(count($xc[$y])==1||end($wc["source"])==$y){$_="";foreach($wc["source"]as$s=>$Ef)$_.=where_link($s,$wc["target"][$s],$L[$Wd][$Ef]);$_=($wc["db"]!=""?preg_replace('~([?&]db=)[^&]+~','\1'.urlencode($wc["db"]),ME):ME).'select='.urlencode($wc["table"]).$_;if($wc["ns"])$_=preg_replace('~([?&]ns=)[^&]+~','\1'.urlencode($wc["ns"]),$_);if(count($wc["source"])==1)break;}}}if($y=="COUNT(*)"){$_=ME."select=".urlencode($a);$s=0;foreach((array)$_GET["where"]as$W){if(!array_key_exists($W["col"],$Ag))$_.=where_link($s++,$W["col"],$W["val"],$W["op"]);}foreach($Ag
as$nd=>$W)$_.=where_link($s++,$nd,$W);}$X=select_value($X,$_,$p,$bg);$t=h("val[$Bg][".bracket_escape($y)."]");$Y=$_POST["val"][$Bg][bracket_escape($y)];$Lb=!is_array($K[$y])&&is_utf8($X)&&$L[$Wd][$y]==$K[$y]&&!$Cc[$y];$ag=preg_match('~text|lob~',$p["type"]);if(($_GET["modify"]&&$Lb)||$Y!==null){$Hc=h($Y!==null?$Y:$K[$y]);echo"<td>".($ag?"<textarea name='$t' cols='30' rows='".(substr_count($K[$y],"\n")+1)."'>$Hc</textarea>":"<input name='$t' value='$Hc' size='$_d[$y]'>");}else{$Ed=strpos($X,"<i>â€¦</i>");echo"<td id='$t' data-text='".($Ed?2:($ag?1:0))."'".($Lb?"":" data-warning='".h('UÅ¼yj linku edycji aby zmieniÄ‡ tÄ™ wartoÅ›Ä‡.')."'").">$X</td>";}}}if($Ja)echo"<td>";$b->backwardKeysPrint($Ja,$L[$Wd]);echo"</tr>\n";}if(is_ajax())exit;echo"</table>\n","</div>\n";}if(!is_ajax()){if($L||$D){$Xb=true;if($_GET["page"]!="last"){if($z==""||(count($L)<$z&&($L||!$D)))$zc=($D?$D*$z:0)+count($L);elseif($x!="sql"||!$ld){$zc=($ld?false:found_rows($S,$Z));if($zc<max(1e4,2*($D+1)*$z))$zc=reset(slow_query(count_rows($a,$Z,$ld,$Dc)));else$Xb=false;}}$ve=($z!=""&&($zc===false||$zc>$z||$D));if($ve){echo(($zc===false?count($L)+1:$zc-$D*$z)>$z?'<p><a href="'.h(remove_from_uri("page")."&page=".($D+1)).'" class="loadmore">'.'Wczytaj wiÄ™cej danych'.'</a>'.script("qsl('a').onclick = partial(selectLoadMore, ".(+$z).", '".'Wczytywanie'."â€¦');",""):''),"\n";}}echo"<div class='footer'><div>\n";if($L||$D){if($ve){$Ld=($zc===false?$D+(count($L)>=$z?2:1):floor(($zc-1)/$z));echo"<fieldset>";if($x!="simpledb"){echo"<legend><a href='".h(remove_from_uri("page"))."'>".'Strona'."</a></legend>",script("qsl('a').onclick = function () { pageClick(this.href, +prompt('".'Strona'."', '".($D+1)."')); return false; };"),pagination(0,$D).($D>5?" â€¦":"");for($s=max(1,$D-4);$s<min($Ld,$D+5);$s++)echo
pagination($s,$D);if($Ld>0){echo($D+5<$Ld?" â€¦":""),($Xb&&$zc!==false?pagination($Ld,$D):" <a href='".h(remove_from_uri("page")."&page=last")."' title='~$Ld'>".'ostatni'."</a>");}}else{echo"<legend>".'Strona'."</legend>",pagination(0,$D).($D>1?" â€¦":""),($D?pagination($D,$D):""),($Ld>$D?pagination($D+1,$D).($Ld>$D+1?" â€¦":""):"");}echo"</fieldset>\n";}echo"<fieldset>","<legend>".'Wybierz wszystkie'."</legend>";$Db=($Xb?"":"~ ").$zc;echo
checkbox("all",1,0,($zc!==false?($Xb?"":"~ ").lang(array('%d rekord','%d rekordy','%d rekordÃ³w'),$zc):""),"var checked = formChecked(this, /check/); selectCount('selected', this.checked ? '$Db' : checked); selectCount('selected2', this.checked || !checked ? '$Db' : checked);")."\n","</fieldset>\n";if($b->selectCommandPrint()){echo'<fieldset',($_GET["modify"]?'':' class="jsonly"'),'><legend>ZmieÅ„</legend><div>
<input type="submit" value="Zapisz zmiany"',($_GET["modify"]?'':' title="'.'Ctrl+kliknij wartoÅ›Ä‡, aby jÄ… edytowaÄ‡.'.'"'),'>
</div></fieldset>
<fieldset><legend>Zaznaczone <span id="selected"></span></legend><div>
<input type="submit" name="edit" value="Edytuj">
<input type="submit" name="clone" value="Duplikuj">
<input type="submit" name="delete" value="UsuÅ„">',confirm(),'</div></fieldset>
';}$yc=$b->dumpFormat();foreach((array)$_GET["columns"]as$f){if($f["fun"]){unset($yc['sql']);break;}}if($yc){print_fieldset("export",'Eksport'." <span id='selected2'></span>");$te=$b->dumpOutput();echo($te?html_select("output",$te,$sa["output"])." ":""),html_select("format",$yc,$sa["format"])," <input type='submit' name='export' value='".'Eksport'."'>\n","</div></fieldset>\n";}$b->selectEmailPrint(array_filter($Pb,'strlen'),$g);}echo"</div></div>\n";if($b->selectImportPrint()){echo"<div>","<a href='#import'>".'Import'."</a>",script("qsl('a').onclick = partial(toggle, 'import');",""),"<span id='import' class='hidden'>: ","<input type='file' name='csv_file'> ",html_select("separator",array("csv"=>"CSV,","csv;"=>"CSV;","tsv"=>"TSV"),$sa["format"],1);echo" <input type='submit' name='import' value='".'Import'."'>","</span>","</div>";}echo"<input type='hidden' name='token' value='$mg'>\n","</form>\n",(!$Dc&&$M?"":script("tableCheck();"));}}}if(is_ajax()){ob_end_clean();exit;}}elseif(isset($_GET["script"])){if($_GET["script"]=="kill")$h->query("KILL ".number($_POST["kill"]));elseif(list($R,$t,$B)=$b->_foreignColumn(column_foreign_keys($_GET["source"]),$_GET["field"])){$z=11;$I=$h->query("SELECT $t, $B FROM ".table($R)." WHERE ".(preg_match('~^[0-9]+$~',$_GET["value"])?"$t = $_GET[value] OR ":"")."$B LIKE ".q("$_GET[value]%")." ORDER BY 2 LIMIT $z");for($s=1;($K=$I->fetch_row())&&$s<$z;$s++)echo"<a href='".h(ME."edit=".urlencode($R)."&where".urlencode("[".bracket_escape(idf_unescape($t))."]")."=".urlencode($K[0]))."'>".h($K[1])."</a><br>\n";if($K)echo"...\n";}exit;}else{page_header('Serwer',"",false);if($b->homepage()){echo"<form action='' method='post'>\n","<p>".'Wyszukaj we wszystkich tabelach'.": <input type='search' name='query' value='".h($_POST["query"])."'> <input type='submit' value='".'Szukaj'."'>\n";if($_POST["query"]!="")search_tables();echo"<div class='scrollable'>\n","<table cellspacing='0' class='nowrap checkable'>\n",script("mixin(qsl('table'), {onclick: tableClick, ondblclick: partialArg(tableClick, true)});"),'<thead><tr class="wrap">','<td><input id="check-all" type="checkbox" class="jsonly">'.script("qs('#check-all').onclick = partial(formCheck, /^tables\[/);",""),'<th>'.'Tabela','<td>'.'Liczba rekordÃ³w',"</thead>\n";foreach(table_status()as$R=>$K){$B=$b->tableName($K);if(isset($K["Engine"])&&$B!=""){echo'<tr'.odd().'><td>'.checkbox("tables[]",$R,in_array($R,(array)$_POST["tables"],true)),"<th><a href='".h(ME).'select='.urlencode($R)."'>$B</a>";$X=format_number($K["Rows"]);echo"<td align='right'><a href='".h(ME."edit=").urlencode($R)."'>".($K["Engine"]=="InnoDB"&&$X?"~ $X":$X)."</a>";}}echo"</table>\n","</div>\n","</form>\n",script("tableCheck();");}}page_footer();