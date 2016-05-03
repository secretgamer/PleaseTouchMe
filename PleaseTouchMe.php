<?php

namespace PleaseThouchMe;

use pocketmine\utils\TextFormat;
use onebone\economyapi\EconomyAPI;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\event\block\SignChangeEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;
use pocketmine\command\CommandSender;
use pocketmine\command\Command;
use pocketmine\tile\Sign;
use pocketmine\block\Block;


class PleaseTouchMe extends PluginBase implements Listener{
	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
		$this->getLogger()->info(TextFormat::RED."제발 날 만져줘(PleaseThouchMe) 플러그인 이 활성화 되었습니다.");
		$this->getLogger()->info(TextFormat::RED."주의! 15세 이상 적용 플러그인 secreter 에게 따지지도 묻지도 마세요 ");
		$this->getLogger()->info(TextFormat::RED."본플러그인 적용시 secreter-EULA 에 동의로 여김");
		if ($this->getServer ()->getPluginManager ()->getPlugin ( "EconomyAPI" ) == null) {
			$this->getLogger ()->error ( "EconomyAPI 플러그인이 없습니다 ! 플러그인 비활성--" );
			$this->getServer ()->getPluginManager ()->disablePlugin ( $this );
		}
	}
	public function onDisable(){
		$this->getLogger()->info(TextFormat::BLUE."좀더 만져주고 가지... 그럼 잘가! ㅠㅠ");
	}
	public function onCommand(CommandSender $sender,Command $command, $label,array $args){
		if($sender->hasPermission("날만져줘")){
			if(!isset($args[0])){
				$sender->sendMessage(TextFormat::AQUA."===표지판 생성===");
				$sender->sendMessage(TextFormat::AQUA."첫쨰줄:날만져줘");
				$sender->sendMessage(TextFormat::AQUA."둘째줄:(1~3)");
				$sender->sendMessage(TextFormat::AQUA."강도조절 입니다");
				$sender->sendMessage(TextFormat::AQUA."===15세 이상!===");
			}
		}
	}
	public function SignChangedEvent(SignChangeEvent $event){
		if ($event->getLine(0)==="날만져줘"&&$event->getLine(1)==="1"){
			$event->setLine(0,TextFormat::GOLD."==날만져줘 ==");
			$event->setLine(1,TextFormat::RED."> - <");
			$event->setLine(2,TextFormat::RED."날 만져주면 100원을 줄꺼얏");
			$event->setLine(3,TextFormat::GOLD."===강도 1===");
		}
		if ($event->getLine(0)==="날만져줘"&&$event->getLine(1)==="2"){
			$event->setLine(0,TextFormat::GOLD."==날만져줘 ==");
			$event->setLine(1,TextFormat::RED."> - <");
			$event->setLine(2,TextFormat::RED."날 만져주면 200원을 줄꺼얏");
			$event->setLine(3,TextFormat::GOLD."===강도 2===");
		}
		if ($event->getLine(0)==="날만져줘"&&$event->getLine(1)==="3"){
			$event->setLine(0,TextFormat::GOLD."==날만져줘 ==");
			$event->setLine(1,TextFormat::RED."> - <");
			$event->setLine(2,TextFormat::RED."날 만져주면 300원을 줄꺼얏");
			$event->setLine(3,TextFormat::GOLD."===강도 3===");
		}
	}
	public function onTouch(PlayerInteractEvent $event){
		$player = $event->getPlayer();
		if ($event->getBlock ()->getId () == Block::SIGN_POST or $event->getBlock ()->getId () == Block::WALL_SIGN){
			$tile = $event->getBlock ()->getLevel ()->getTile ( $event->getBlock () );
			if ($tile instanceof Sign) {
				$text = $tile->getText ();
				if($text[0]==TextFormat::GOLD."==날만져줘 =="&&$text[1]==TextFormat::RED."> - <"&&$text[2]==TextFormat::RED."날 만져주면 100원을 줄꺼얏"&&$text[3]==TextFormat::GOLD."===강도 1==="){
					switch(mt_rand(0, 20)){
						case 0:
							$player->sendMessage(TextFormat::GREEN."더만져줘!");
						case 1:
							$player->sendMessage(TextFormat::GREEN."여기말고! 좀더 위!");
						case 2:
							$player->sendMessage(TextFormat::GREEN."읏");
						case 3:
							$player->sendMessage(TextFormat::GREEN."조왓");
						case 4:
							$player->sendMessage(TextFormat::GREEN."좀더!");
						case 5:
							$player->sendMessage("아닛!") ;
						case 6:
							$player->sendMessage("후후") ;
					    case 7:
					    	$player->sendMessage("..........") ;
						case 8:
							$player->sendMessage("엇!") ;
					}
					EconomyAPI::getInstance ()->addMoney ( $player, 100 );
				}
			}
			if ($tile instanceof Sign) {
				$text = $tile->getText ();
				if($text[0]==TextFormat::GOLD."==날만져줘 =="&&$text[1]==TextFormat::RED."> - <"&&$text[2]==TextFormat::RED."날 만져주면 200원을 줄꺼얏"&&$text[3]==TextFormat::GOLD."===강도 2==="){
					switch(mt_rand(0, 20)){
						case 0:
							$player->sendMessage(TextFormat::GREEN."조왓");
						case 1:
							$player->sendMessage(TextFormat::GREEN."더만져줘!");
						case 2:
							$player->sendMessage(TextFormat::GREEN."아흫!");
						case 3:
							$player->sendMessage(TextFormat::GREEN."후웃....");
						case 4:
							$player->sendMessage(TextFormat::GREEN."좀더!");
						case 5:
							$player->sendMessage("으앗!") ;
						case 6:
							$player->sendMessage("그만해! 너무아팟!") ;
						case 7:
							$player->sendMessage("좀더!") ;
						case 8:
							$player->sendMessage("아읔!") ;
					}
					EconomyAPI::getInstance ()->addMoney ( $player, 200 );
				}	
			}
			if ($tile instanceof Sign) {
				$text = $tile->getText ();
				if($text[0]==TextFormat::GOLD."==날만져줘 =="&&$text[1]==TextFormat::RED."> - <"&&$text[2]==TextFormat::RED."날 만져주면 300원을 줄꺼얏"&&$text[3]==TextFormat::GOLD."===강도 3==="){
					switch(mt_rand(0, 20)){
						case 0:
							$player->sendMessage(TextFormat::GREEN."더빨리!");
						case 1:
							$player->sendMessage(TextFormat::GREEN."아흫!");
						case 2:
							$player->sendMessage(TextFormat::GREEN."엇! 거긴!");
						case 3:
							$player->sendMessage(TextFormat::GREEN."좀더만져줘! 더!");
						case 4:
							$player->sendMessage(TextFormat::GREEN."너무 조왓!");
						case 5:
							$player->sendMessage("앗 좀더 위에 만져줘") ;
						case 6:
							$player->sendMessage("거기 계속 만져줘") ;
						case 7:
							$player->sendMessage("조왓") ;
						case 8:
							$player->sendMessage("아흫!") ;
					}
					EconomyAPI::getInstance ()->addMoney ( $player, 300 );
				}
			}
		}
	}
}
?>