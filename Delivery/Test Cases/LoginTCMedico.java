package tests;


import java.util.List;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;

public class LoginTCMedico {

	public static void main(String[] args) {
		System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
		WebDriver driver = new ChromeDriver();
		driver.navigate().to(Configurations.HOMEPAGE);
		driver.manage().window().maximize();
		try{
			//login come medico
			
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[1]")).sendKeys("lol@lol.it");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[2]")).sendKeys("Asdfghjkl123");
		driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[2]/input[1]")).click();
		List<WebElement> list = driver.findElements(By.xpath("//*[contains(text(),'" + "Benvenuto Medico" + "')]"));
		Assert.assertTrue(list.size() > 0, "Text 'Benvenuto Medico' not found!");
		System.out.println("Test Passed");
		}catch(AssertionError e){
			System.out.println("Test Failed");
			System.out.println(e.getMessage());
		}
		driver.close();
	}

}
