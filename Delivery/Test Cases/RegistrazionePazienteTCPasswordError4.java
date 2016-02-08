package tests;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
/**
 * Registrazione paziente password che non contiene numeri e lettere maiuscole
 * PREREQUISITO: Deve essere compresa tra 8 e 30 caratteri
 * Parametri
 * Nome: Raffaele
 * Cognome: Cataletti
 * Indirizzo: Nel Mondo
 * Codice Fiscale: abcdefghi1234lmn
 * Email: asd@asd.it
 * Password: abcdefghijklmno
 * Ripeti Password: Asdfghjkl123
 * Data di nascita: 29-05-1993
 * Citt� di residenza:lolloland
 * 
 * Valore atteso: vedi riga 50
 * @author Vincenzo
 * 
 *
 */
public class RegistrazionePazienteTCPasswordError4{

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		driver.navigate().to(Configurations.HOMEPAGE);
		driver.manage().window().maximize();
		try{
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[2]/input[2]")).click();
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[1]/td[2]/input")).sendKeys("Raffaele");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[2]/td[2]/input")).sendKeys("Cataletti");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[1]/td[4]/input")).sendKeys("Nel Mondo");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[3]/td[2]/input")).sendKeys("abcdefghi1234lmn");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[2]/td[4]/input")).sendKeys("asd@asd.it");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[3]/td[4]/input")).sendKeys("abcdefghijklmno");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[1]")).sendKeys("29");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[2]")).sendKeys("05");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[3]")).sendKeys("1993");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[4]/input")).sendKeys("Asdfghjkl123");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[5]/td[2]/input")).sendKeys("lolloland");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/input")).click();
		List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + 
		"Valore non corretto per il campo Password. La password deve essere tra i 8 e i 30 caratteri e deve contenere almeno un carattere maiuscolo, uno minuscolo e un numero" 
				+ "')]"));
		Assert.assertTrue(list.size() > 0, 
				"Valore non corretto per il campo Password. La password deve essere tra i 8 e i 30 caratteri e deve contenere almeno un carattere maiuscolo, uno minuscolo e un numero"
				);
		System.out.println("Test Passed");
		}catch(AssertionError e){
			System.out.println("Test Failed");
			System.out.println(e.getMessage());
		}
		driver.close();
	}
}