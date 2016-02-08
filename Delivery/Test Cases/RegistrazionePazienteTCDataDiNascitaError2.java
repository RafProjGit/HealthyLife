package tests;

import java.util.Calendar;
import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;
/**
 * Registrazione paziente data di nascita non valida
 * Parametri
 * Nome: Raffaele
 * Cognome: Cataletti
 * Indirizzo: Nel Mondo
 * Codice Fiscale: abcdefghi1234lmn
 * Email: asd@asd.it
 * Password: Asdfghjkl123
 * Ripeti Password: Asdfghjkl123
 * Data di nascita: 00-00-0000
 * Città di residenza:lolloland
 * 
 * Valore atteso: vedi riga 50
 * @author Vincenzo
 * 
 *
 */
public class RegistrazionePazienteTCDataDiNascitaError2{

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
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[3]/td[4]/input")).sendKeys("Asdfghjkl123");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[1]")).sendKeys("00");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[2]")).sendKeys("00");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/table/tbody/tr[4]/td[2]/input[3]")).sendKeys("0000");
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