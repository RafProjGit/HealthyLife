//Questo test controlla che non venga visualizzato nessun medico se i dati inseriti non appartengono a nessun medico presente nel database

package tests;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;

public class AggiungiPrimaVisitaTCFailed {

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		driver.navigate().to(Configurations.HOMEPAGE);
		driver.manage().window().maximize();
		try{
      	driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[1]")).sendKeys("asd@asd.it");
	    driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[2]")).sendKeys("Asdfghjkl123");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[2]/input[1]")).click();
		driver.findElement(By.xpath("html/body/div/div/table/tbody/tr[2]/td[1]/a")).click();
		driver.findElement(By.xpath(".//*[@id='textNomeMedico']")).sendKeys("nome");
		driver.findElement(By.xpath(".//*[@id='textCognomeMedico']")).sendKeys("cognome");
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/input[3]")).sendKeys("residenza");
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/input[5]")).click();
		List<WebElement> list = driver.findElements(By.tagName("option"));        
		 
        Assert.assertTrue(list.size() == 0, 
        		"Lista di pazienti vuota" 
        		);System.out.println("Test Passed");
		}catch(AssertionError e){
			System.out.println("Test Failed");
			System.out.println(e.getMessage());
		}
		driver.close();
	}

}