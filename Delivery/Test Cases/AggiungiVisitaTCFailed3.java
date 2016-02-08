//Controllo sull'orario . Le visite possono essere aggiunte con intervalli di 15 minuti 

package tests;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;

public class AggiungiVisitaTCFailed3 {

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		driver.navigate().to(Configurations.HOMEPAGE);
		driver.manage().window().maximize();
		try{
      	driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[1]")).sendKeys("lol@lol.it");
	    driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[2]")).sendKeys("Asdfghjkl123");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[2]/input[1]")).click();
		driver.findElement(By.xpath("html/body/div/div/table/tbody/tr[2]/td[2]/a")).click();
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/input[1]")).sendKeys("10/02/2016");
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/label[1]/input")).sendKeys("16:24");
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/input[3]")).click();
      	List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + "Valore non corretto per il campo orario." + "')]"));		    		
 
		        Assert.assertTrue(list.size() > 0, 
					"Valore non corretto per il campo orario." 
					);System.out.println("Test Passed");
		}catch(AssertionError e){
			System.out.println("Test Failed");
			System.out.println(e.getMessage());
		}
		driver.close();
	}

}