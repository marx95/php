<?php require_once("../config/masterconfig.php"); ?>
<table style="text-align: left">
<tr><td colspan='2'>Comandos do GameMaster</td></tr>
	<tr>
		<td width="35%">! MSG</td>
		<td>Fala para o servidor inteiro</td>
	</tr>
	<tr>
		<td>/b MSG</td>
		<td>Fala para o servidor inteiro mostrando o nome</td>
	</tr>
	<tr>
		<td>/chatoff NOME</td>
		<td>Desativa o chat e post do personagem</td>
	</tr>
	<tr>
		<td>/chaton NOME</td>
		<td>Ativa o chat e post do personagem</td>
	</tr>
	<tr>
		<td>/disconnect NOME</td>
		<td>Disconecta o personagem</td>
	</tr>
	<tr>
		<td>/trace NOME</td>
		<td>Vai até o personagem</td>
	</tr>
	<tr>
		<td>/puxar NOME</td>
		<td>Puxa o personagem até você</td>
	</tr>
	<tr>
		<td>/salagm</td>
		<td>Acessa a sala de GM</td>
	</tr>
	<tr>
		<td>/jinfo NOME</td>
		<td>Mostra informações do Personagem</td>
	</tr>
	<tr>
		<td>/skin -1</td>
		<td>Fica com Skin normal</td>
	</tr>
	<tr>
		<td>/skin -2</td>
		<td>Skin padrão de GM</td>
	</tr>
	<tr>
		<td>/setevento MapaID x y</td>
		<td>Ativa o comando /evento<br /><b>Exemplo: /setevento 2 123 123 Será setado para devias coordenada 123 123</td>
	</tr>
	<tr>
		<td>/setevento 0 0 0</td>
		<td>Desativa o comando /evento</td>
	</tr>
	<tr>
		<td>/gmove Nome MapaID x y</td>
		<td>Move o personagem ao mapa e coordenadas</td>
	</tr>
	<tr>
		<td>/noticiasoff</td>
		<td>Desativa noticias automaticas do server</td>
	</tr>
	<tr>
		<td>/noticiason</td>
		<td>Ativa noticias automaticas do server</td>
	</tr>
	</table>
	<table style="text-align: left">
	<tr><td colspan='4'>ID dos Mapas - <a href="painel_gm/moves.txt" rel="external" style="color:#CC3300">Lista completa</a></td></tr>
	<tr>
		<td width="25%"><b>MapaID</b></td>
		<td width="25%"><b>Mapa</b></td>
		<td width="25%"><b>Padrão</b></td>
		<td><b>Especial</b></td>
	</tr>
	<tr>
		<td>0</td>
		<td>Lorencia</td>
		<td>125 125</td>
		<td>7 140</td>
	</tr>
	<tr>
		<td>1</td>
		<td>Dungeon</td>
		<td>223 126</td>
		<td>119 46</td>
	</tr>
	<tr>
		<td>2</td>
		<td>Devias</td>
		<td>222 62</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>3</td>
		<td>Noria</td>
		<td>176 110</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>4</td>
		<td>Lost-Tower</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>6</td>
		<td>Arena</td>
		<td>60 120</td>
		<td>120 120</td>
	</tr>
	<tr>
		<td>7</td>
		<td>Atlans</td>
		<td>24 19</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>8</td>
		<td>Tarkan</td>
		<td>187 58</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>9</td>
		<td>Devil-Square</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>10</td>
		<td>Icarus</td>
		<td>15 13</td>
		<td>47 205</td>
	</tr>
	<tr>
		<td>11</td>
		<td>Blood-Castle I</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>12</td>
		<td>Blood-Castle II</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>13</td>
		<td>Blood-Castle III</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>14</td>
		<td>Blood-Castle IV</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>15</td>
		<td>Blood-Castle V</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>16</td>
		<td>Blood-Castle VI</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>18</td>
		<td>Chaos-Castle I</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>19</td>
		<td>Chaos-Castle II</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>20</td>
		<td>Chaos-Castle III</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>21</td>
		<td>Chaos-Castle IV</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>22</td>
		<td>Chaos-Castle V</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>23</td>
		<td>Chaos-Castle VI</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>24</td>
		<td>Kalima I</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>25</td>
		<td>Kalima II</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>26</td>
		<td>Kalima III</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>27</td>
		<td>Kalima IV</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>28</td>
		<td>Kalima V</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>29</td>
		<td>Kalima VI</td>
		<td>&nbsp;</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>30</td>
		<td>Valley of Loren</td>
		<td>28 40</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>31</td>
		<td>Land of Trials</td>
		<td>61 10</td>
		<td>60 60</td>
	</tr>
	<tr>
		<td>33</td>
		<td>Aida</td>
		<td>85 9</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>34</td>
		<td>CryWolf</td>
		<td>102 171</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>37</td>
		<td>Kantru Remains</td>
		<td>23 215</td>
		<td>211 38</td>
	</tr>
	<tr>
		<td>38</td>
		<td>Kantru Relics</td>
		<td>78 105</td>
		<td>141 185</td>
	</tr>
	<tr>
		<td>40</td>
		<td>Silent Map</td>
		<td>220 12</td>
		<td>/salagm</td>
	</tr>
	<tr>
		<td>41</td>
		<td>Barracks</td>
		<td>30 74</td>
		<td>&nbsp;</td>
	</tr>
	<tr>
		<td>42</td>
		<td>Refuge</td>
		<td>83 173</td>
		<td></td>
	</tr>
	</table>