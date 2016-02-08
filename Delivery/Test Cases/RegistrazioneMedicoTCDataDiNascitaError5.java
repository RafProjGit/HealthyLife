package tests;

import java.util.Calendar;
import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
/**
 * Registrazione medico data di nascita con giorno 30 con mese febbraio
 * Parametri
 * Nome: Vincenzo
 * Cognome: Nunziata
 * Indirizzo: Nel Mondo
 * Codice Attestato: abcdefghij123456
 * Email: asd@asd.it
 * Password: Asdfghjkl123
 * Ripeti Password: Asdfghjkl123
 * Data di nascita: 30-02-1996
 * Città di residenza:lolloland
 * 
 * Valore atteso: vedi riga 50
 * @author Vincenzo
 * 
 *
 */
public class RegistrazioneMedicoTCDataDiNascitaError5{

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		driver.navigate().to(Configurations.HOMEPAGE);
		driver.manage().window().maximize();
		try{
			driver.findElement(By.xpath("html/body/div[2]/a")).click();
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[1]/td[2]/input")).sendKeys("Vincenzo");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[2]/td[2]/input")).sendKeys("Nunziata");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[1]/td[4]/input")).sendKeys("Nel Mondo");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[3]/td[2]/input")).sendKeys("abcdefghij123456");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[2]/td[4]/input")).sendKeys("asd@asd.it");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[3]/td[4]/input")).sendKeys("Asdfghjkl123");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[1]")).sendKeys("30");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[2]")).sendKeys("02");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[3]")).sendKeys("1996");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[4]/input")).sendKeys("Asdfghjkl123");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[5]/td[2]/input")).sendKeys("lolloland");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/input")).click();
			int maxDate = (Calendar.getInstance().get(Calendar.YEAR)-3);
			List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + 
					"Operazione fallita, la data inserita non è corretta. Ricorda che il campo Anno deve essere compreso tra 1900 e " + maxDate +""
					+ "')]"
					));
			Assert.assertTrue(list.size() > 0, 
					"Operazione fallita, la data inserita non è corretta. Ricorda che il campo Anno deve essere compreso tra 1900 e " + maxDate + ""
					);
			System.out.println("Test Passed");
		}catch(AssertionError e){
			System.out.println("Test Failed");
			System.out.println(e.getMessage());
		}
		driver.close();
	}
}