		<?php
		//lista de options
		$listaoptexe[1] = "<input name='epcex1' type='checkbox' id='epcex1' value='0' onclick='soma_ex(1)' />";
		$listaoptexe[2] = "<input name='epcex2' type='checkbox' id='epcex2' value='0' onclick='soma_ex(2)' />";
		$listaoptexe[3] = "<input name='epcex3' type='checkbox' id='epcex3' value='0' onclick='soma_ex(3)' />";
		$listaoptexe[4] = "<input name='epcex4' type='checkbox' id='epcex4' value='0' onclick='soma_ex(4)' />";
		$listaoptexe[5] = "<input name='epcex5' type='checkbox' id='epcex5' value='0' onclick='soma_ex(5)' />";
		$listaoptexe[6] = "<input name='epcex6' type='checkbox' id='epcex6' value='0' onclick='soma_ex(6)' />";
		
		//com reflete
		switch($listar_item[1]){
		case "elmos":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Defesa +25</option>";
		$JOHOPT[2] = "<option value='2'>AG M&aacute;ximo +25</option>";
		$JOHOPT[3] = "<option value='3'>Vida M&aacute;ximo +30</option>";
		$JOHOPT[4] = "<option value='4'>Recupera&ccedil;&atilde;o de Vida +8</option>";
		$JOHOPT[5] = "<option value='5'>Recupera&ccedil;&atilde;o de Mana +5</option>";
		$JOHOPT[6] = "<option value='6'>Taxa de Sucesso de Defesa +8</option>";
		$JOHOPT[7] = "<option value='7'>Taxa diminui&ccedil;&atilde;o de Dano +7%</option>";
		$JOHOPT[8] = "<option value='8'>Taxa de SD +5</option>";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		
		
		case "armaduras":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Defesa +25</option>";
		$JOHOPT[2] = "<option value='2'>AG M&aacute;ximo +25</option>";
		$JOHOPT[3] = "<option value='3'>Vida M&aacute;ximo +30</option>";
		$JOHOPT[4] = "<option value='4'>Recupera&ccedil;&atilde;o de Vida +8</option>";
		$JOHOPT[5] = "<option value='5'>Recupera&ccedil;&atilde;o de Mana +5</option>";
		$JOHOPT[6] = "<option value='6'>Taxa de Sucesso de Defesa +8</option>";
		$JOHOPT[7] = "<option value='7'>Taxa diminui&ccedil;&atilde;o de Dano +7%</option>";
		$JOHOPT[8] = "<option value='8'>Taxa de SD +5</option>";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		case "calcas":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Defesa +25</option>";
		$JOHOPT[2] = "<option value='2'>AG M&aacute;ximo +25</option>";
		$JOHOPT[3] = "<option value='3'>Vida M&aacute;ximo +30</option>";
		$JOHOPT[4] = "<option value='4'>Recupera&ccedil;&atilde;o de Vida +8</option>";
		$JOHOPT[5] = "<option value='5'>Recupera&ccedil;&atilde;o de Mana +5</option>";
		$JOHOPT[6] = "<option value='6'>Taxa de Sucesso de Defesa +8</option>";
		$JOHOPT[7] = "<option value='7'>Taxa diminui&ccedil;&atilde;o de Dano +7%</option>";
		$JOHOPT[8] = "<option value='8'>Taxa de SD +5</option>";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		case "luvas":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Defesa +25</option>";
		$JOHOPT[2] = "<option value='2'>AG M&aacute;ximo +25</option>";
		$JOHOPT[3] = "<option value='3'>Vida M&aacute;ximo +30</option>";
		$JOHOPT[4] = "<option value='4'>Recupera&ccedil;&atilde;o de Vida +8</option>";
		$JOHOPT[5] = "<option value='5'>Recupera&ccedil;&atilde;o de Mana +5</option>";
		$JOHOPT[6] = "<option value='6'>Taxa de Sucesso de Defesa +8</option>";
		$JOHOPT[7] = "<option value='7'>Taxa diminui&ccedil;&atilde;o de Dano +7%</option>";
		$JOHOPT[8] = "<option value='8'>Taxa de SD +5</option>";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		case "botas":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Defesa +25</option>";
		$JOHOPT[2] = "<option value='2'>AG M&aacute;ximo +25</option>";
		$JOHOPT[3] = "<option value='3'>Vida M&aacute;ximo +30</option>";
		$JOHOPT[4] = "<option value='4'>Recupera&ccedil;&atilde;o de Vida +8</option>";
		$JOHOPT[5] = "<option value='5'>Recupera&ccedil;&atilde;o de Mana +5</option>";
		$JOHOPT[6] = "<option value='6'>Taxa de Sucesso de Defesa +8</option>";
		$JOHOPT[7] = "<option value='7'>Taxa diminui&ccedil;&atilde;o de Dano +7%</option>";
		$JOHOPT[8] = "<option value='8'>Taxa de SD +5</option>";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		case "escudos":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 0;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Defesa +25</option>";
		$JOHOPT[2] = "<option value='2'>AG M&aacute;ximo +25</option>";
		$JOHOPT[3] = "<option value='3'>Vida M&aacute;ximo +30</option>";
		$JOHOPT[4] = "<option value='4'>Recupera&ccedil;&atilde;o de Vida +8</option>";
		$JOHOPT[5] = "<option value='5'>Recupera&ccedil;&atilde;o de Mana +5</option>";
		$JOHOPT[6] = "<option value='6'>Taxa de Sucesso de Defesa +8</option>";
		$JOHOPT[7] = "<option value='7'>Taxa diminui&ccedil;&atilde;o de Dano +7%</option>";
		$JOHOPT[8] = "<option value='8'>Taxa de SD +5</option>";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		case "aneis":
		$listarlevel = 1;
		$listarluck = 0;
		$listaropt = 1;
		$listarskill = 0;
		$listaranc = 1;
		$listarref = 0;
		$listarjoh = 0;
		$listarexe = 1;

		$listaexe[1] = "Aumenta HP m&aacute;ximo em 4%"; 
		$listaexe[2] = "Aumenta Mana m&aacute;xima em 4%"; 
		$listaexe[3] = "Diminui dano em 4%"; 
		$listaexe[4] = "Reflete 5% do dano"; 
		$listaexe[5] = "Sucesso na taxa de defesa 10%"; 
		$listaexe[6] = "Taxa de aquisi&ccedil;&atilde;o de zen em 40%"; 

		$JOHOPT[0] = "";
		$JOHOPT[1] = "";
		$JOHOPT[2] = "";
		$JOHOPT[3] = "";
		$JOHOPT[4] = "";
		$JOHOPT[5] = "";
		$JOHOPT[6] = "";
		$JOHOPT[7] = "";
		$JOHOPT[8] = "";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		
		//SEM REFLETE
		case "espadas":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Ataque Mínimo +20</option>";
		$JOHOPT[2] = "<option value='2'>Poder de Ataque M&aacute;ximo +29</option>";
		$JOHOPT[3] = "<option value='3'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='4'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='5'>Ataque (Max, Min) +19</option>";
		$JOHOPT[6] = "<option value='6'>Dano Crítico +30</option>";
		$JOHOPT[7] = "<option value='7'>Poder de Skill +22</option>";
		$JOHOPT[8] = "<option value='8'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='9'>Taxa de SD +10</option>";
		$JOHOPT[10] = "<option value='10'>Ignorar Taxa de SD +10</option>";
		break;
		
		case "staffs":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Ataque M&aacute;gico +31</option>";
		$JOHOPT[3] = "<option value='2'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='3'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='4'>Poder da skill +30</option>";
		$JOHOPT[6] = "<option value='5'>Dano Crítico +28</option>";
		$JOHOPT[7] = "<option value='6'>Taxa de SD +13</option>";
		$JOHOPT[8] = "<option value='7'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='8'>Ignorar Taxa de SD +15</option>";
		$JOHOPT[10] = "";
		break;
		
		case "axes":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 0;
		$listarref = 0;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Ataque Mínimo +20</option>";
		$JOHOPT[2] = "<option value='2'>Poder de Ataque M&aacute;ximo +29</option>";
		$JOHOPT[3] = "<option value='3'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='4'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='5'>Ataque (Max, Min) +19</option>";
		$JOHOPT[6] = "<option value='6'>Dano Crítico +30</option>";
		$JOHOPT[7] = "<option value='7'>Poder de Skill +22</option>";
		$JOHOPT[8] = "<option value='8'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='9'>Taxa de SD +10</option>";
		$JOHOPT[10] = "<option value='10'>Ignorar Taxa de SD +10</option>";
		break;
		
		case "spears":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 0;
		$listarref = 0;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Ataque Mínimo +20</option>";
		$JOHOPT[2] = "<option value='2'>Poder de Ataque M&aacute;ximo +29</option>";
		$JOHOPT[3] = "<option value='3'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='4'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='5'>Ataque (Max, Min) +19</option>";
		$JOHOPT[6] = "<option value='6'>Dano Crítico +30</option>";
		$JOHOPT[7] = "<option value='7'>Poder de Skill +22</option>";
		$JOHOPT[8] = "<option value='8'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='9'>Taxa de SD +10</option>";
		$JOHOPT[10] = "<option value='10'>Ignorar Taxa de SD +10</option>";
		break;
		
		case "maces":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 0;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Ataque Mínimo +20</option>";
		$JOHOPT[2] = "<option value='2'>Poder de Ataque M&aacute;ximo +29</option>";
		$JOHOPT[3] = "<option value='3'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='4'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='5'>Ataque (Max, Min) +19</option>";
		$JOHOPT[6] = "<option value='6'>Dano Crítico +30</option>";
		$JOHOPT[7] = "<option value='7'>Poder de Skill +22</option>";
		$JOHOPT[8] = "<option value='8'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='9'>Taxa de SD +10</option>";
		$JOHOPT[10] = "<option value='10'>Ignorar Taxa de SD +10</option>";
		break;

		case "scepters":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 0;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Ataque Mínimo +20</option>";
		$JOHOPT[2] = "<option value='2'>Poder de Ataque M&aacute;ximo +29</option>";
		$JOHOPT[3] = "<option value='3'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='4'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='5'>Ataque (Max, Min) +19</option>";
		$JOHOPT[6] = "<option value='6'>Dano Crítico +30</option>";
		$JOHOPT[7] = "<option value='7'>Poder de Skill +22</option>";
		$JOHOPT[8] = "<option value='8'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='9'>Taxa de SD +10</option>";
		$JOHOPT[10] = "<option value='10'>Ignorar Taxa de SD +10</option>";
		break;

		case "arcos":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 1;
		$listaranc = 1;
		$listarref = 1;
		$listarjoh = 1;
		$listarexe = 1;

		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "<option value='0'>Sem Jewel of Harmony</option>";
		$JOHOPT[1] = "<option value='1'>Poder de Ataque Mínimo +20</option>";
		$JOHOPT[2] = "<option value='2'>Poder de Ataque M&aacute;ximo +29</option>";
		$JOHOPT[3] = "<option value='3'>For&ccedil;a Necess&aacute;ria -40</option>";
		$JOHOPT[4] = "<option value='4'>Agilidade Necess&aacute;ria -40</option>";
		$JOHOPT[5] = "<option value='5'>Ataque (Max, Min) +19</option>";
		$JOHOPT[6] = "<option value='6'>Dano Crítico +30</option>";
		$JOHOPT[7] = "<option value='7'>Poder de Skill +22</option>";
		$JOHOPT[8] = "<option value='8'>% Taxa de Ataque +14</option>";
		$JOHOPT[9] = "<option value='9'>Taxa de SD +10</option>";
		$JOHOPT[10] = "<option value='10'>Ignorar Taxa de SD +10</option>";
		break;

		case "asas":
		$listarlevel = 1;
		$listarluck = 1;
		$listaropt = 1;
		$listarskill = 0;
		$listaranc = 0;
		$listarref = 0;
		$listarjoh = 0;
		$listarexe = 1;

		$listaexe[6] = "+115 HP"; 
		$listaexe[5] = "+115 MP"; 
		$listaexe[4] = "Ignora a Defesa do Inimigo em 3%"; 
		$listaexe[3] = "+50 Estamina"; 
		$listaexe[2] = "+Velocidade de Magina +7"; 
		$listaexe[1] = "";

		$JOHOPT[0] = "";
		$JOHOPT[1] = "";
		$JOHOPT[2] = "";
		$JOHOPT[3] = "";
		$JOHOPT[4] = "";
		$JOHOPT[5] = "";
		$JOHOPT[6] = "";
		$JOHOPT[7] = "";
		$JOHOPT[8] = "";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;

		case "colares":
		$listarlevel = 1;
		$listarluck = 0;
		$listaropt = 1;
		$listarskill = 0;
		$listaranc = 1;
		$listarref = 0;
		$listarjoh = 0;
		$listarexe = 1;
		$listaexe[6] = "Aumenta taxa de recupera&ccedil;&atilde;o de mana contra Monstros - mana/8"; 
		$listaexe[5] = "Aumenta taxa de recupera&ccedil;&atilde;o de Vida contra Monstros - Vida/8"; 
		$listaexe[4] = "Aumenta a velocidade de ataque (m&aacute;gico) em +7"; 
		$listaexe[3] = "Aumenta o dano em +2%"; 
		$listaexe[2] = "Aumenta o dano - level/20"; 
		$listaexe[1] = "Taxa de dano excelente +10%";

		$JOHOPT[0] = "";
		$JOHOPT[1] = "";
		$JOHOPT[2] = "";
		$JOHOPT[3] = "";
		$JOHOPT[4] = "";
		$JOHOPT[5] = "";
		$JOHOPT[6] = "";
		$JOHOPT[7] = "";
		$JOHOPT[8] = "";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		
		case "joias":
		$listarlevel = 0;
		$listarluck = 0;
		$listaropt = 0;
		$listarskill = 0;
		$listaranc = 0;
		$listarref = 0;
		$listarjoh = 0;
		$listarexe = 0;
		$listaexe[1] = ""; 
		$listaexe[2] = ""; 
		$listaexe[3] = ""; 
		$listaexe[4] = ""; 
		$listaexe[5] = ""; 
		$listaexe[6] = ""; 
		
		$listaoptexe[1]= "";
		$listaoptexe[2] = "";
		$listaoptexe[3] = "";
		$listaoptexe[4] = "";
		$listaoptexe[5] = "";
		$listaoptexe[6] = "";

		$JOHOPT[0] = "";
		$JOHOPT[1] = "";
		$JOHOPT[2] = "";
		$JOHOPT[3] = "";
		$JOHOPT[4] = "";
		$JOHOPT[5] = "";
		$JOHOPT[6] = "";
		$JOHOPT[7] = "";
		$JOHOPT[8] = "";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;

		case "pets":
		$listarlevel = 0;
		$listarluck = 0;
		$listaropt = 0;
		$listarskill = 0;
		$listaranc = 0;
		$listarref = 0;
		$listarjoh = 0;
		$listarexe = 0;

		$listaexe[1] = "Ataque"; 
		$listaexe[2] = "Defesa"; 
		$listaexe[3] = "Ilus&atilde;o"; 
		$listaexe[4] = ""; 
		$listaexe[5] = ""; 
		$listaexe[6] = ""; 

		$listaoptexe[1] = "<input name='epcex1' type='checkbox' id='epcex1' value='0' onclick='trava(1)' />";
		$listaoptexe[2] = "<input name='epcex2' type='checkbox' id='epcex2' value='0' onclick='trava(2)' />";
		$listaoptexe[3] = "<input name='epcex3' type='checkbox' id='epcex3' value='0' onclick='trava(3)' />";
		$listaoptexe[4] = "";
		$listaoptexe[5] = "";
		$listaoptexe[6] = "";

		$JOHOPT[0] = "";
		$JOHOPT[1] = "";
		$JOHOPT[2] = "";
		$JOHOPT[3] = "";
		$JOHOPT[4] = "";
		$JOHOPT[5] = "";
		$JOHOPT[6] = "";
		$JOHOPT[7] = "";
		$JOHOPT[8] = "";
		$JOHOPT[9] = "";
		$JOHOPT[10] = "";
		break;
		}
?>