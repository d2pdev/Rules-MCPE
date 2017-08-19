<?php
namespace D2P;

use pocketmine\Server;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\plugin\PluginBase;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class Main extends PluginBase{
	public function onEnable(){
		@mkdir($this->getDataFolder());
		
		if(!file_exists($this->getDataFolder() . "config.yml")){
			file_put_contents($this->getDataFolder() . "config.yml",yaml_emit(array()));
		}
		$this->config = new Config($this->getDataFolder() . "config.yml", Config::YAML, [
				// tạo ra file config
				"Luật 1" => "Luật của bạn",
				"Luật 2" => "Luật của bạn",				
				"Luật 3" => "Luật của bạn",				
				"Luật 4" => "Luật của bạn",
				"Luật 5" => "Luật của bạn",
		]);
		$this->getLogger()->info(TextFormat::GREEN ."Khởi chạy plugin");
    }	    	
	
	public function onCommand(CommandSender $sender, Command $command, $label, array $args){
		switch($command->getName()){
			case "luat": // lệnh
			case "rules": // lệnh	
			    $sender->sendMessage(TextFormat::GREEN ."Luật Server");
				$sender->sendMessage($this->config->get("Luật 1"));
				$sender->sendMessage($this->config->get("Luật 2"));
				$sender->sendMessage($this->config->get("Luật 3"));
				$sender->sendMessage($this->config->get("Luật 4"));
				$sender->sendMessage($this->config->get("Luật 5"));
				return true;
	}
}
  }