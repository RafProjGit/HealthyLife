//precodinzione non deve essere gi� presente nella lista pazienti del medico
package tests;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;

public class AggiungiPazienteTC {
		public static void main(String[] args) {
			System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
			WebDriver driver = new ChromeDriver();
			driver.navigate().to(Configurations.HOMEPAGE);
			driver.manage().window().maximize();
			try{
            driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[1]")).sendKeys("lol@lol.it");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[2]")).sendKeys("Asdfghjkl123");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[2]/input[1]")).click();
            driver.findElement(By.xpath("html/body/div/div/table/tbody/tr[2]/td[1]/a")).click();
				//login come paziente, se vuoi loggare come medico cambi la mail in lol@lol.it
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td[2]/input[1]")).click();
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td[2]/input[2]")).sendKeys("asd@asd.it");
			driver.findElement(By.xpath("html/body/form/table/tbody/tr/td[2]/input[3]")).click();
            List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + "Paziente aggiunto con successo" + "')]"));
			Assert.assertTrue(list.size() > 0, 
					"Paziente aggiunto con successo" 
					);
			System.out.println("Test Passed");
			}catch(AssertionError e){
				System.out.println("Test Failed");
				System.out.println(e.getMessage());
			}
			driver.close();
		}

}

