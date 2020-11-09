<?php declare(strict_types=1);

require_once 'revertCharacters.php';

use PHPUnit\Framework\TestCase;

final class RevertCharactersTest extends TestCase
{
	
    /**
    * @dataProvider providerRevertStrings
    */
    public function testRevertCharacters($inputString, $validResult): void
    {
        $this->assertEquals($inputString, revertCharacters($validResult));
    }
	
	public function providerRevertStrings ()
    {
        return [
			["", ""],
			["abc", "cba"],
			["Привет!", "Тевирп!"],
			["ПривЕт!", "ТевиРп!"],
			["TailEr!", "ReliAt!"],
			["βθθρ!", "ρθθβ!"],
			[".,!? . , ! ? ;", ".,!? . , ! ? ;"],
			["Привет! Давно не виделись.", "Тевирп! Онвад ен ьсиледив."],
			["Tailer, how are you?", "Reliat, woh era uoy?"],
		];
	}
}