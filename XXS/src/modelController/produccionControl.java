package modelController;

import java.io.Serializable;

import javax.annotation.Resource;
import javax.enterprise.context.SessionScoped;
import javax.inject.Named;
import javax.persistence.EntityManager;
import javax.persistence.PersistenceContext;
import javax.transaction.UserTransaction;

@Named
@SessionScoped

public class produccionControl implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	private Produccion produccion;
	
	produccionControl(){
		produccion = new Produccion();
	}
	
	@PersistenceContext(unitName = "XXS")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;

	public Produccion getProduccion() {
		return produccion;
	}

	public void setProduccion(Produccion produccion) {
		this.produccion = produccion;
	}
	
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(produccion);
	    userTransaction.commit();
	}

}