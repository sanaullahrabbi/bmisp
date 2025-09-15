import React from 'react';
import { 
  Wifi, 
  Users, 
  Building, 
  Globe, 
  Home, 
  Headphones, 
  CheckCircle, 
  ArrowRight,
  Play,
  MapPin,
  Phone,
  Mail,
  Clock,
  Award,
  Zap,
  Shield,
  Star,
  UserPlus,
  LogIn
} from 'lucide-react';

function App() {
  return (
    <div className="min-h-screen bg-white">
      {/* Header */}
      <header className="bg-white shadow-sm border-b border-gray-100 sticky top-0 z-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="flex justify-between items-center h-16">
            <div className="flex items-center space-x-2">
              <div className="w-10 h-10 bg-gradient-to-br from-red-500 to-red-600 rounded-lg flex items-center justify-center">
                <Globe className="w-6 h-6 text-white" />
              </div>
              <span className="text-2xl font-bold bg-gradient-to-r from-red-600 to-gray-900 bg-clip-text text-transparent">
                BMISP
              </span>
            </div>
            
            <nav className="hidden md:flex items-center space-x-8">
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Home</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">About Us</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Packages</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">FTTH</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Coverage Area</a>
              <a href="#" className="text-gray-700 hover:text-red-600 font-medium transition-colors">Contact</a>
            </nav>

            <button className="bg-red-600 text-white px-6 py-2 rounded-lg font-medium hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl">
              Get Started
            </button>
          </div>
        </div>
      </header>

      {/* Hero Section */}
      <section className="relative bg-gradient-to-br from-gray-50 to-white py-20 overflow-hidden">
        <div className="absolute inset-0 bg-gradient-to-r from-red-500/5 to-gray-900/5"></div>
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative">
          <div className="grid lg:grid-cols-2 gap-12 items-center">
            <div className="space-y-8">
              <div className="space-y-4">
                <h1 className="text-5xl lg:text-6xl font-bold text-gray-900 leading-tight">
                  Welcome to{' '}
                  <span className="bg-gradient-to-r from-red-600 to-gray-900 bg-clip-text text-transparent">
                    BMISP
                  </span>
                </h1>
                <p className="text-xl text-gray-600 leading-relaxed">
                  Your trusted partner for high-speed fiber internet. Experience lightning-fast connectivity 
                  that powers your digital life.
                </p>
              </div>
              
              <div className="flex flex-col sm:flex-row gap-4">
                <button className="bg-red-600 text-white px-8 py-4 rounded-xl font-semibold hover:bg-red-700 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                  <span>Get Started</span>
                  <ArrowRight className="w-5 h-5" />
                </button>
                <button className="border-2 border-red-600 text-red-600 px-8 py-4 rounded-xl font-semibold hover:bg-red-50 transition-all duration-300 flex items-center justify-center space-x-2">
                  <Play className="w-5 h-5" />
                  <span>Watch Demo</span>
                </button>
              </div>
            </div>
            
            <div className="relative">
              <div className="bg-red-600 rounded-2xl p-8 shadow-2xl transform rotate-3 hover:rotate-0 transition-transform duration-500">
                <div className="bg-white/10 backdrop-blur-sm rounded-xl p-6 space-y-4">
                  <div className="flex items-center space-x-3">
                    <Zap className="w-8 h-8 text-white" />
                    <span className="text-white font-semibold text-lg">Ultra-Fast Speed</span>
                  </div>
                  <div className="space-y-2">
                    <div className="bg-white/20 rounded-full h-2">
                      <div className="bg-white rounded-full h-2 w-4/5 animate-pulse"></div>
                    </div>
                    <p className="text-white/90 text-sm">Up to 1 Gbps Download Speed</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Services Section */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Our Services</h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              Comprehensive internet solutions designed to meet all your connectivity needs
            </p>
          </div>
          
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {[
              { icon: Wifi, title: 'Home Broadband', desc: 'High-speed internet for your home' },
              { icon: Users, title: 'Product Service', desc: 'Tailored solutions for businesses' },
              { icon: Building, title: 'Business Service', desc: 'Enterprise-grade connectivity' },
              { icon: Globe, title: 'SME Service', desc: 'Perfect for small & medium enterprises' },
              { icon: Home, title: 'Residential Service', desc: 'Reliable home internet packages' },
              { icon: Headphones, title: 'Support Service', desc: '24/7 customer support' }
            ].map((service, index) => (
              <div key={index} className="group bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 hover:border-red-200 transform hover:-translate-y-2">
                <div className="bg-red-100 w-16 h-16 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                  <service.icon className="w-8 h-8 text-red-600" />
                </div>
                <h3 className="text-xl font-semibold text-gray-900 mb-3">{service.title}</h3>
                <p className="text-gray-600 leading-relaxed">{service.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Pricing Plans */}
      <section className="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Pricing Plans</h2>
            <p className="text-xl text-gray-600">Choose the perfect plan for your needs</p>
          </div>
          
          <div className="grid md:grid-cols-3 gap-8">
            {[
              {
                name: 'Starter',
                speed: '11 Mbps',
                price: '550',
                features: [
                  'Free installation charge (Tk 500)',
                  'Great for basic usage',
                  '24/7 Technical Support',
                  'No data limit'
                ]
              },
              {
                name: 'Home Plus',
                speed: '15 Mbps',
                price: '600',
                popular: true,
                features: [
                  'Free installation charge (Tk 500)',
                  'Perfect for families',
                  '24/7 Technical Support',
                  'No data limit',
                  'Priority Support'
                ]
              },
              {
                name: 'Premium',
                speed: '20 Mbps',
                price: '800',
                features: [
                  'Free installation charge (Tk 500)',
                  'Best for heavy usage',
                  '24/7 Technical Support',
                  'No data limit',
                  'Premium Support',
                  'Free Router'
                ]
              }
            ].map((plan, index) => (
              <div key={index} className={`relative bg-white rounded-2xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2 ${plan.popular ? 'ring-2 ring-red-500 scale-105' : ''}`}>
                {plan.popular && (
                  <div className="absolute -top-4 left-1/2 transform -translate-x-1/2">
                    <span className="bg-gradient-to-r from-red-500 to-red-600 text-white px-6 py-2 rounded-full text-sm font-semibold shadow-lg">
                      Most Popular
                    </span>
                  </div>
                )}
                
                <div className="text-center mb-8">
                  <h3 className="text-2xl font-bold text-gray-900 mb-2">{plan.name}</h3>
                  <div className="bg-red-100 rounded-xl p-4 mb-4">
                    <span className="text-3xl font-bold text-red-600">{plan.speed}</span>
                  </div>
                  <div className="flex items-baseline justify-center">
                    <span className="text-4xl font-bold text-gray-900">TK {plan.price}</span>
                    <span className="text-gray-500 ml-2">/mo</span>
                  </div>
                </div>
                
                <ul className="space-y-4 mb-8">
                  {plan.features.map((feature, idx) => (
                    <li key={idx} className="flex items-start space-x-3">
                      <CheckCircle className="w-5 h-5 text-red-500 mt-0.5 flex-shrink-0" />
                      <span className="text-gray-600">{feature}</span>
                    </li>
                  ))}
                </ul>
                
                <button className={`w-full py-4 rounded-xl font-semibold transition-all duration-300 transform hover:scale-105 ${
                  plan.popular 
                    ? 'bg-red-600 text-white shadow-lg hover:shadow-xl hover:bg-red-700' 
                    : 'border-2 border-red-600 text-red-600 hover:bg-red-50'
                }`}>
                  Choose Plan
                </button>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* How It Works */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">How It Works</h2>
            <p className="text-xl text-gray-600">Get connected in three simple steps</p>
          </div>
          
          <div className="grid md:grid-cols-3 gap-8">
            {[
              {
                step: '1',
                title: 'Choose Product',
                desc: 'Browse our plans to select the best package that suits your needs'
              },
              {
                step: '2',
                title: 'Complete Profile',
                desc: 'Fill out your profile with all the info to get started with your service'
              },
              {
                step: '3',
                title: 'Start Connection',
                desc: 'Enjoy high-speed internet service with all the convenience you need'
              }
            ].map((step, index) => (
              <div key={index} className="text-center group">
                <div className="relative mb-8">
                  <div className="w-20 h-20 bg-red-600 rounded-full flex items-center justify-center mx-auto shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-110">
                    <span className="text-2xl font-bold text-white">{step.step}</span>
                  </div>
                  {index < 2 && (
                    <div className="hidden md:block absolute top-10 left-full w-full h-0.5 bg-red-200 transform -translate-x-10"></div>
                  )}
                </div>
                <h3 className="text-xl font-semibold text-gray-900 mb-3">{step.title}</h3>
                <p className="text-gray-600 leading-relaxed">{step.desc}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Video Tutorial Section */}
      <section className="py-20 bg-gray-50">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-12">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Watch Our Story</h2>
            <p className="text-xl text-gray-600 max-w-3xl mx-auto">
              See how BMISP is transforming internet connectivity across Bangladesh. 
              From our humble beginnings to becoming a trusted fiber internet provider.
            </p>
          </div>
          
          <div className="max-w-4xl mx-auto">
            <div className="relative bg-gray-900 rounded-2xl overflow-hidden shadow-2xl">
              <img 
                src="https://images.pexels.com/photos/5077047/pexels-photo-5077047.jpeg?auto=compress&cs=tinysrgb&w=1200" 
                alt="BMISP Brand Story"
                className="w-full h-96 object-cover"
              />
              <div className="absolute inset-0 bg-black/50 flex items-center justify-center">
                <button className="w-24 h-24 bg-red-600 rounded-full flex items-center justify-center shadow-2xl hover:bg-red-700 transition-all duration-300 transform hover:scale-110 group">
                  <Play className="w-10 h-10 text-white ml-1 group-hover:scale-110 transition-transform" />
                </button>
              </div>
              <div className="absolute bottom-6 left-6 right-6">
                <div className="bg-white/95 backdrop-blur-sm rounded-xl p-6">
                  <h3 className="text-xl font-bold text-gray-900 mb-2">BMISP Brand Story</h3>
                  <p className="text-gray-600 mb-4">
                    Discover how we're revolutionizing internet connectivity in Bangladesh with 
                    cutting-edge fiber technology and exceptional customer service.
                  </p>
                  <div className="flex items-center space-x-4 text-sm text-gray-500">
                    <span className="flex items-center space-x-1">
                      <Clock className="w-4 h-4" />
                      <span>3:45 min</span>
                    </span>
                    <span>•</span>
                    <span>Company Overview</span>
                  </div>
                </div>
              </div>
            </div>
            
            <div className="grid md:grid-cols-3 gap-6 mt-8">
              <div className="text-center p-6 bg-white rounded-xl shadow-lg">
                <div className="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                  <CheckCircle className="w-6 h-6 text-red-600" />
                </div>
                <h4 className="font-semibold text-gray-900 mb-2">Professional Installation</h4>
                <p className="text-sm text-gray-600">Expert technicians ensure perfect setup</p>
              </div>
              
              <div className="text-center p-6 bg-white rounded-xl shadow-lg">
                <div className="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                  <CheckCircle className="w-6 h-6 text-red-600" />
                </div>
                <h4 className="font-semibold text-gray-900 mb-2">24/7 Support</h4>
                <p className="text-sm text-gray-600">Round-the-clock technical assistance</p>
              </div>
              
              <div className="text-center p-6 bg-white rounded-xl shadow-lg">
                <div className="w-12 h-12 bg-red-100 rounded-lg flex items-center justify-center mx-auto mb-4">
                  <CheckCircle className="w-6 h-6 text-red-600" />
                </div>
                <h4 className="font-semibold text-gray-900 mb-2">No Hidden Costs</h4>
                <p className="text-sm text-gray-600">Transparent pricing with no surprises</p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Team Section */}
      <section className="py-20 bg-gradient-to-br from-gray-50 to-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="text-center mb-16">
            <h2 className="text-4xl font-bold text-gray-900 mb-4">Talented Team Members</h2>
            <p className="text-xl text-gray-600">Meet the experts behind our exceptional service</p>
          </div>
          
          <div className="grid md:grid-cols-3 gap-8">
            {[
              { name: 'MD Nayeemul', role: 'Network Administrator', image: 'https://images.pexels.com/photos/2379004/pexels-photo-2379004.jpeg?auto=compress&cs=tinysrgb&w=400' },
              { name: 'Md. Saju Khan Dipu', role: 'Senior Network Engineer', image: 'https://images.pexels.com/photos/2182970/pexels-photo-2182970.jpeg?auto=compress&cs=tinysrgb&w=400' },
              { name: 'Nayeem', role: 'Customer Support Lead', image: 'https://images.pexels.com/photos/1222271/pexels-photo-1222271.jpeg?auto=compress&cs=tinysrgb&w=400' }
            ].map((member, index) => (
              <div key={index} className="group text-center">
                <div className="relative mb-6 mx-auto w-48 h-48">
                  <img 
                    src={member.image} 
                    alt={member.name}
                    className="w-full h-full object-cover rounded-full shadow-lg group-hover:shadow-2xl transition-all duration-300 transform group-hover:scale-105"
                  />
                  <div className="absolute inset-0 bg-gradient-to-t from-red-500/20 to-transparent rounded-full opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                </div>
                <h3 className="text-xl font-semibold text-gray-900 mb-2">{member.name}</h3>
                <p className="text-red-600 font-medium">{member.role}</p>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* Stats Section */}
      <section className="py-20 bg-white">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-2 gap-12 items-center">
            <div className="space-y-8">
              <div className="grid grid-cols-2 gap-8">
                <div className="text-center p-6 bg-gradient-to-br from-red-50 to-gray-50 rounded-2xl">
                  <div className="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <MapPin className="w-6 h-6 text-white" />
                  </div>
                  <div className="text-3xl font-bold text-gray-900 mb-2">200+</div>
                  <div className="text-gray-600">Coverage Areas</div>
                </div>
                
                <div className="text-center p-6 bg-gradient-to-br from-red-50 to-gray-50 rounded-2xl">
                  <div className="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <Users className="w-6 h-6 text-white" />
                  </div>
                  <div className="text-3xl font-bold text-gray-900 mb-2">400+</div>
                  <div className="text-gray-600">Happy Customers</div>
                </div>
                
                <div className="text-center p-6 bg-gradient-to-br from-red-50 to-gray-50 rounded-2xl">
                  <div className="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <Award className="w-6 h-6 text-white" />
                  </div>
                  <div className="text-3xl font-bold text-gray-900 mb-2">3+</div>
                  <div className="text-gray-600">Years Experience</div>
                </div>
                
                <div className="text-center p-6 bg-gradient-to-br from-red-50 to-gray-50 rounded-2xl">
                  <div className="w-12 h-12 bg-red-600 rounded-xl flex items-center justify-center mx-auto mb-4">
                    <Star className="w-6 h-6 text-white" />
                  </div>
                  <div className="text-3xl font-bold text-gray-900 mb-2">4+</div>
                  <div className="text-gray-600">Awards Won</div>
                </div>
              </div>
            </div>
            
            <div className="space-y-6">
              <h2 className="text-4xl font-bold text-gray-900">
                Trusted by thousands across Bangladesh
              </h2>
              <p className="text-xl text-gray-600 leading-relaxed">
                FTTB provides direct fiber-to-the-home connections via speeds up to 1 Gbps. 
                Our network infrastructure is designed to deliver consistent, reliable internet 
                service to residential and business customers across 200+ locations.
              </p>
              <div className="flex items-center space-x-4">
                <Shield className="w-8 h-8 text-red-600" />
                <span className="text-lg font-medium text-gray-900">99.9% Uptime Guarantee</span>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* CTA Section */}
      <section className="py-20 bg-red-600 relative overflow-hidden">
        <div className="absolute inset-0 bg-black/10"></div>
        <div className="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center relative">
          <h2 className="text-4xl lg:text-5xl font-bold text-white mb-6">
            Ready to Get Connected?
          </h2>
          <p className="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Join thousands of satisfied customers enjoying ultra-fast fiber internet. Get started today!
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center items-center">
            <button className="bg-white text-red-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center space-x-2">
              <ArrowRight className="w-5 h-5" />
              <span>Choose Your Plan</span>
            </button>
            <button className="bg-white text-red-600 px-8 py-4 rounded-xl font-semibold hover:bg-gray-50 transition-all duration-300 transform hover:scale-105 shadow-lg hover:shadow-xl flex items-center space-x-2">
              <Phone className="w-5 h-5" />
              <span>Call Now: +880 1234 567890</span>
            </button>
          </div>
          
          <div className="mt-12 pt-8 border-t border-white/20">
            <p className="text-white/80 mb-4">Download our mobile app for easy account management</p>
            <div className="flex flex-col sm:flex-row gap-3 justify-center items-center">
              <button className="bg-black/20 backdrop-blur-sm text-white px-6 py-3 rounded-lg font-medium hover:bg-black/30 transition-all duration-300 flex items-center space-x-2">
                <span>📱</span>
                <span>Google Play</span>
              </button>
              <button className="bg-black/20 backdrop-blur-sm text-white px-6 py-3 rounded-lg font-medium hover:bg-black/30 transition-all duration-300 flex items-center space-x-2">
                <span>🍎</span>
                <span>App Store</span>
              </button>
            </div>
          </div>
        </div>
      </section>

      {/* Footer */}
      <footer className="bg-gray-900 text-white py-16">
        <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
          <div className="grid md:grid-cols-4 gap-8">
            <div className="space-y-4">
              <div className="flex items-center space-x-2">
                <div className="w-10 h-10 bg-red-600 rounded-lg flex items-center justify-center">
                  <Globe className="w-6 h-6 text-white" />
                </div>
                <span className="text-2xl font-bold">BMISP</span>
              </div>
              <p className="text-gray-400 leading-relaxed">
                Your trusted partner for high-speed fiber internet connectivity across Bangladesh.
              </p>
            </div>
            
            <div>
              <h3 className="text-lg font-semibold mb-4">Services</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition-colors">Home Broadband</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Business Internet</a></li>
                <li><a href="#" className="hover:text-white transition-colors">FTTH Solutions</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Technical Support</a></li>
              </ul>
            </div>
            
            <div>
              <h3 className="text-lg font-semibold mb-4">Quick Links</h3>
              <ul className="space-y-2 text-gray-400">
                <li><a href="#" className="hover:text-white transition-colors">About Us</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Coverage Area</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Pricing</a></li>
                <li><a href="#" className="hover:text-white transition-colors">Contact</a></li>
              </ul>
            </div>
            
            <div>
              <h3 className="text-lg font-semibold mb-4">Contact Info</h3>
              <div className="space-y-3 text-gray-400">
                <div className="flex items-center space-x-3">
                  <Phone className="w-5 h-5 text-red-600" />
                  <span>+880 1234 567890</span>
                </div>
                <div className="flex items-center space-x-3">
                  <Mail className="w-5 h-5 text-red-600" />
                  <span>info@bmisp.net</span>
                </div>
                <div className="flex items-center space-x-3">
                  <MapPin className="w-5 h-5 text-red-600" />
                  <span>Dhaka, Bangladesh</span>
                </div>
              </div>
            </div>
          </div>
          
          <div className="border-t border-gray-800 mt-12 pt-8 text-center text-gray-400">
            <p>&copy; 2024 BMISP. All rights reserved. | Designed with ❤️ for better connectivity</p>
          </div>
        </div>
      </footer>

      {/* Floating Action Buttons */}
      <div className="fixed bottom-6 right-6 z-50 flex flex-col space-y-3">
        {/* Phone Call Button */}
        <a 
          href="tel:+8801234567890"
          className="group bg-red-600 hover:bg-red-700 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center"
          title="Call Now"
        >
          <Phone className="w-6 h-6" />
        </a>
        
        {/* New Connection Button */}
        <a 
          href="#new-connection"
          className="group bg-gray-900 hover:bg-black text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center"
          title="New Connection"
        >
          <UserPlus className="w-6 h-6" />
        </a>
        
        {/* Client Login Button */}
        <a 
          href="#client-login"
          className="group bg-gray-700 hover:bg-gray-800 text-white p-4 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-110 flex items-center justify-center"
          title="Client Login"
        >
          <LogIn className="w-6 h-6" />
        </a>
      </div>
    </div>
  );
}

export default App;