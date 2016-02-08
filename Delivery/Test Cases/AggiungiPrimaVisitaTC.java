package tests;

import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;

public class AggiungiPrimaVisitaTC {

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
		driver.findElement(By.xpath(".//*[@id='textNomeMedico']")).sendKeys("Vincenzo");
		driver.findElement(By.xpath(".//*[@id='textCognomeMedico']")).sendKeys("Nunziata");
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/input[3]")).sendKeys("");
		driver.findElement(By.xpath("html/body/table/tbody/tr/td[1]/form/input[5]")).click();
		driver.findElement(By.xpath(".//*[@id='selectRisultati']/option")).click();
		driver.findElement(By.xpath(".//*[@id='confirmButton']/input")).click();	
        	List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + "Richiesta inviata con successo" + "')]"));		
        Assert.assertTrue(list.size() > 0, 
					"Richiesta inviata con successo" 
					);
	System.out.println("Test Passed");
		}catch(AssertionError e){
			System.out.println("Test Failed");
			System.out.println(e.getMessage());
		}
		driver.close();
	}

}