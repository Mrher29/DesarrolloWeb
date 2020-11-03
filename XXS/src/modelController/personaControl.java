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

public class personaControl implements Serializable {
	
	private static final long serialVersionUID = 1L;
	
	private Persona persona;
	
	personaControl(){
		persona = new Persona();
	}
	
	@PersistenceContext(unitName = "XXS")
	private EntityManager em;    

	@Resource
	private UserTransaction userTransaction;

	public Persona getPersona() {
		return persona;
	}

	public void setPersona(Persona persona) {
		this.persona = persona;
	}
	
	public void guardar() throws Exception  {
	    userTransaction.begin();
	    em.persist(persona);
	    userTransaction.commit();
	}

}