//Il test lascia un campo vuoto e controlla se viene mostrato l'avviso

package tests;

import java.util.List;

import org.openqa.selenium.Alert;
import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;
import org.openqa.selenium.chrome.ChromeDriver;
import org.testng.Assert;

public class ModificaMenuTCFailed {
	
		public static WebDriver driver;
		public static void main(String[] args) {
			System.setProperty("webdriver.chrome.driver", "C:/WebServerSelenium/chromedriver.exe");
			driver = new ChromeDriver();
			driver.navigate().to(Configurations.HOMEPAGE);
			driver.manage().window().maximize();
			try{
				//login come medico
				driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[1]")).sendKeys("lol@lol.it");
				driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[1]/input[2]")).sendKeys("Asdfghjkl123");
				driver.findElement(By.xpath("html/body/form/table/tbody/tr/td/div/center[2]/input[1]")).click();
				
				//click su Elenco Pazienti
				driver.findElement(By.xpath(".//*[@id='buttonTable']/tbody/tr[1]/td[2]/a")).click();

				//click sul primo paziente
				driver.findElement(By.xpath(".//*[@id='tablePazienti']/tbody/tr[3]/td[1]")).click();
				
				//click su modifica menu
			driver.findElement(By.xpath(".//*[@id='buttonTable']/tbody/tr[1]/td[2]/a")).click();
            driver.findElement(By.xpath("html/body/table/tbody[2]/tr[4]/td[2]")).click();
			driver.findElement(By.xpath("html/body/table/tbody[2]/tr[4]/td[3]")).click();

			//qui ci vanno le operazioni da fare: click su di un elemento, riempimenti di campi, ecc...
			
			
			//modifica l'asserzione con quello che vuoi. Questa cerca all'interno di tutta la pagina 
			
			 //org.testng.Assert.assertTrue(isAlertPresent());
             Alert alert = driver.switchTo().alert();
             org.testng.Assert.assertEquals(alert.getText(), "Il campo non puo essere vuoto");    
            
            alert.accept();
            System.out.println("Test Passed");
			}catch(AssertionError e){
				System.out.println("Test Failed");
				System.out.println(e.getMessage());
			}
			driver.close();
		}
        public static boolean isAlertPresent() {
        try {
            driver.switchTo().alert();
            return true;
            } // try
        catch (Exception e) {
            return false;
        } // catch
       }

}

